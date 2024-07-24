// aula 05
// criar a variável modalKey sera global
let modalKey = 0

// variavel para controlar a quantidade inicial de bebida na modal
let quantbebida = 1

let cart = [] // carrinho
// /aula 05

// funcoes auxiliares ou uteis
const seleciona = (elemento) => document.querySelector(elemento)
const selecionaTodos = (elemento) => document.querySelectorAll(elemento)

const formatoReal = (valor) => {
    return valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
}

const formatoMonetario = (valor) => {
    if(valor) {
        return valor.toFixed(2)
    }
}

const abrirModal = () => {
    seleciona('.bebidaWindowArea').style.opacity = 0 // transparente
    seleciona('.bebidaWindowArea').style.display = 'flex'
    setTimeout(() => seleciona('.bebidaWindowArea').style.opacity = 1, 150)
}

const fecharModal = () => {
    seleciona('.bebidaWindowArea').style.opacity = 0 // transparente
    setTimeout(() => seleciona('.bebidaWindowArea').style.display = 'none', 500)
}

const botoesFechar = () => {
    // BOTOES FECHAR MODAL
    selecionaTodos('.bebidaInfo--cancelButton, .bebidaInfo--cancelMobileButton').forEach( (item) => item.addEventListener('click', fecharModal) )
}

const preencheDadosDasbebida = (bebidaItem, item, index) => {
    // aula 05
    // setar um atributo para identificar qual elemento foi clicado
	bebidaItem.setAttribute('data-key', index)
    bebidaItem.querySelector('.bebida-item--img img').src = item.img
    bebidaItem.querySelector('.bebida-item--price').innerHTML = formatoReal(item.price[2])
    bebidaItem.querySelector('.bebida-item--name').innerHTML = item.name
    bebidaItem.querySelector('.bebida-item--desc').innerHTML = item.description
}

const preencheDadosModal = (item) => {
    seleciona('.bebidaBig img').src = item.img
    seleciona('.bebidaInfo h1').innerHTML = item.name
    seleciona('.bebidaInfo--desc').innerHTML = item.description
    seleciona('.bebidaInfo--actualPrice').innerHTML = formatoReal(item.price[2])
}

// aula 05
const pegarKey = (e) => {
    // .closest retorna o elemento mais proximo que tem a class que passamos
    // do .bebida-item ele vai pegar o valor do atributo data-key
    let key = e.target.closest('.bebida-item').getAttribute('data-key')
    console.log('Bebida clicada ' + key)
    console.log(bebidaJson[key])

    // garantir que a quantidade inicial de bebida é 1
    quantbebida = 1

    // Para manter a informação de qual bebida foi clicada
    modalKey = key

    return key
}

const preencherTamanhos = (key) => {
    // tirar a selecao de tamanho atual e selecionar o tamanho grande
    seleciona('.bebidaInfo--size.selected').classList.remove('selected')

    // selecionar todos os tamanhos
    selecionaTodos('.bebidaInfo--size').forEach((size, sizeIndex) => {
        // selecionar o tamanho grande
        (sizeIndex == 2) ? size.classList.add('selected') : ''
        size.querySelector('span').innerHTML = bebidaJson[key].sizes[sizeIndex]
    })
}

const escolherTamanhoPreco = (key) => {
    // Ações nos botões de tamanho
    // selecionar todos os tamanhos
    selecionaTodos('.bebidaInfo--size').forEach((size, sizeIndex) => {
        size.addEventListener('click', (e) => {
            // clicou em um item, tirar a selecao dos outros e marca o q vc clicou
            // tirar a selecao de tamanho atual e selecionar o tamanho grande
            seleciona('.bebidaInfo--size.selected').classList.remove('selected')
            // marcar o que vc clicou, ao inves de usar e.target use size, pois ele é nosso item dentro do loop
            size.classList.add('selected')

            // mudar o preço de acordo com o tamanho
            seleciona('.bebidaInfo--actualPrice').innerHTML = formatoReal(bebidaJson[key].price[sizeIndex])
        })
    })
}

const mudarQuantidade = () => {
    // Ações nos botões + e - da janela modal
    seleciona('.bebidaInfo--qtmais').addEventListener('click', () => {
        quantbebida++
        seleciona('.bebidaInfo--qt').innerHTML = quantbebida
    })

    seleciona('.bebidaInfo--qtmenos').addEventListener('click', () => {
        if(quantbebida > 1) {
            quantbebida--
            seleciona('.bebidaInfo--qt').innerHTML = quantbebida	
        }
    })
}

const adicionarNoCarrinho = () => {
    seleciona('.bebidaInfo--addButton').addEventListener('click', () => {
        console.log('Adicionar no carrinho')

        // pegar dados da janela modal atual
    	// qual bebida? pegue o modalKey para usar bebidaJson[modalKey]
    	console.log("bebida " + modalKey)
    	// tamanho
	    let size = seleciona('.bebidaInfo--size.selected').getAttribute('data-key')
	    console.log("Tamanho " + size)
	    // quantidade
    	console.log("Quant. " + quantbebida)
        // preco
        let price = seleciona('.bebidaInfo--actualPrice').innerHTML.replace('R$&nbsp;', '')
    
        // crie um identificador que junte id e tamanho
	    // concatene as duas informacoes separadas por um símbolo, vc escolhe
	    let identificador = bebidaJson[modalKey].id+'b'+size

        // antes de adicionar verifique se ja tem aquele codigo e tamanho
        // para adicionarmos a quantidade
        let key = cart.findIndex( (item) => item.identificador == identificador )
        console.log(key)

        if(key > -1) {
            // se encontrar aumente a quantidade
            cart[key].qt += quantbebida
        } else {
            // adicionar objeto bebida no carrinho
            let bebida = {
                identificador,
                id: bebidaJson[modalKey].id,
                size, // size: size
                qt: quantbebida,
                price: parseFloat(price) // price: price
            }
            cart.push(bebida)
            console.log(bebida)
            console.log('Sub total R$ ' + (bebida.qt * bebida.price).toFixed(2))
        }

        fecharModal()
        abrirCarrinho()
        atualizarCarrinho()
    })
}

const abrirCarrinho = () => {
    console.log('Qtd de itens no carrinho ' + cart.length)
    if(cart.length > 0) {
        // mostrar o carrinho
	    seleciona('aside').classList.add('show')
        seleciona('header').style.display = 'flex' // mostrar barra superior
    }

    // exibir aside do carrinho no modo mobile
    seleciona('.menu-openner').addEventListener('click', () => {
        if(cart.length > 0) {
            seleciona('aside').classList.add('show')
            seleciona('aside').style.left = '0'
        }
    })
}

const fecharCarrinho = () => {
    // fechar o carrinho com o botão X no modo mobile
    seleciona('.menu-closer').addEventListener('click', () => {
        seleciona('aside').style.left = '100vw' // usando 100vw ele ficara fora da tela
        seleciona('header').style.display = 'flex'
    })
}

const atualizarCarrinho = () => {
    // exibir número de itens no carrinho
	seleciona('.menu-openner span').innerHTML = cart.length
	
	// mostrar ou nao o carrinho
	if(cart.length > 0) {

		// mostrar o carrinho
		seleciona('aside').classList.add('show')

		// zerar meu .cart para nao fazer insercoes duplicadas
		seleciona('.cart').innerHTML = ''

        // crie as variaveis antes do for
		let subtotal = 0
		let desconto = 0
		let total    = 0

        // para preencher os itens do carrinho, calcular subtotal
		for(let i in cart) {
			// use o find para pegar o item por id
			let bebidaItem = bebidaJson.find( (item) => item.id == cart[i].id )
			console.log(bebidaItem)

            // em cada item pegar o subtotal
        	subtotal += cart[i].price * cart[i].qt
            //console.log(cart[i].price)

			// fazer o clone, exibir na telas e depois preencher as informacoes
			let cartItem = seleciona('.models .cart--item').cloneNode(true)
			seleciona('.cart').append(cartItem)

			let bebidaizeName = cart[i].size

			//let bebidaName = `${bebidaItem.name} (${bebidaizeName})`
            let bebidaName = `${bebidaItem.name}`

			// preencher as informacoes
			cartItem.querySelector('img').src = bebidaItem.img
			cartItem.querySelector('.cart--item-nome').innerHTML = bebidaName
			cartItem.querySelector('.cart--item--qt').innerHTML = cart[i].qt

			// selecionar botoes + e -
			cartItem.querySelector('.cart--item-qtmais').addEventListener('click', () => {
				console.log('Clicou no botão mais')
				// adicionar apenas a quantidade que esta neste contexto
				cart[i].qt++
				// atualizar a quantidade
				atualizarCarrinho()
			})

			cartItem.querySelector('.cart--item-qtmenos').addEventListener('click', () => {
				console.log('Clicou no botão menos')
				if(cart[i].qt > 1) {
					// subtrair apenas a quantidade que esta neste contexto
					cart[i].qt--
				} else {
					// remover se for zero
					cart.splice(i, 1)
				}

                (cart.length < 1) ? seleciona('header').style.display = 'flex' : ''

				// atualizar a quantidade
				atualizarCarrinho()
			})

			seleciona('.cart').append(cartItem)

		} // fim do for

		// fora do for
		// calcule desconto 10% e total
		//desconto = subtotal * 0.1
		desconto = subtotal * 0
		total = subtotal - desconto

		// exibir na tela os resultados
		// selecionar o ultimo span do elemento
		seleciona('.subtotal span:last-child').innerHTML = formatoReal(subtotal)
		seleciona('.desconto span:last-child').innerHTML = formatoReal(desconto)
		seleciona('.total span:last-child').innerHTML    = formatoReal(total)

	} else {
		// ocultar o carrinho
		seleciona('aside').classList.remove('show')
		seleciona('aside').style.left = '100vw'
	}
}

const finalizarCompra = () => {
    seleciona('.cart--finalizar').addEventListener('click', () => {
        console.log('Finalizar compra')
        seleciona('aside').classList.remove('show')
        seleciona('aside').style.left = '100vw'
        seleciona('header').style.display = 'flex'
    })
}

// /aula 06

// MAPEAR bebidaJson para gerar lista de bebida
bebidaJson.map((item, index ) => {
    //console.log(item)
    let bebidaItem = document.querySelector('.models .bebida-item').cloneNode(true)
    //console.log(bebidaItem)
    //document.querySelector('.bebida-area').append(bebidaItem)
    seleciona('.bebida-area').append(bebidaItem)

    // preencher os dados de cada bebida
    preencheDadosDasbebida(bebidaItem, item, index)
    
    // bebida clicada
    bebidaItem.querySelector('.bebida-item a').addEventListener('click', (e) => {
        e.preventDefault()
        console.log('Clicou na bebida')

        // aula 05
        let chave = pegarKey(e)
        // /aula 05

        // abrir janela modal
        abrirModal()

        // preenchimento dos dados
        preencheDadosModal(item)

        // aula 05
        // pegar tamanho selecionado
        preencherTamanhos(chave)

		// definir quantidade inicial como 1
		seleciona('.bebidaInfo--qt').innerHTML = quantbebida

        // selecionar o tamanho e preco com o clique no botao
        escolherTamanhoPreco(chave)
        // /aula 05

    })

    botoesFechar()

}) // fim do MAPEAR bebidaJson para gerar lista de bebida

// aula 05
// mudar quantidade com os botoes + e -
mudarQuantidade()
// /aula 05

// aula 06
adicionarNoCarrinho()
atualizarCarrinho()
fecharCarrinho()
finalizarCompra()
// /aula 06
