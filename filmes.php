<?php

session_start();

if($_SESSION["id_usuarios"] == null) {
    header("Location: /");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design-filmes.css">
    <title>Filmes</title>
</head>

<body>

    <header>
        <form id="form">
            <input type="text" placeholder="Buscar" id="buscar" class="buscar">
        </form>
    </header>

    <main id="main">
        <div class="filme">
            <img src="" alt="imagem">

            <div class="info-filme">
                <h3>Título do Filme</h3>
                <span class="verde">9.8</span>
            </div>

            <div class="resumo-filme">
                <h3>Avaliações</h3>
                Lorem ipsum dolor sit amet.
                Sed animi iste sed saepe consectetur
                est alias enim eum sequi consequuntur
                est dignissimos atque.
            </div>

        </div>

        <div class="filme">
            <img src="" alt="imagem">

            <div class="info-filme">
                <h3>Título do Filme</h3>
                <span class="verde">9.8</span>
            </div>

            <div class="resumo-filme">
                <h3>Avaliações</h3>
                Lorem ipsum dolor sit amet.
                Sed animi iste sed saepe consectetur
                est alias enim eum sequi consequuntur
                est dignissimos atque.
            </div>

        </div>

        <div class="filme">
            <img src="" alt="imagem">

            <div class="info-filme">
                <h3>Título do Filme</h3>
                <span class="verde">9.8</span>
            </div>

            <div class="resumo-filme">
                <h3>Avaliações</h3>
                Lorem ipsum dolor sit amet.
                Sed animi iste sed saepe consectetur
                est alias enim eum sequi consequuntur
                est dignissimos atque.
            </div>

        </div>

        <div class="filme">
            <img src="" alt="imagem">

            <div class="info-filme">
                <h3>Título do Filme</h3>
                <span class="verde">9.8</span>
            </div>

            <div class="resumo-filme">
                <h3>Avaliações</h3>
                Lorem ipsum dolor sit amet.
                Sed animi iste sed saepe consectetur
                est alias enim eum sequi consequuntur
                est dignissimos atque.
            </div>

        </div>

        <div class="filme">
            <img src="" alt="imagem">

            <div class="info-filme">
                <h3>Título do Filme</h3>
                <span class="verde">9.8</span>
            </div>

            <div class="resumo-filme">
                <h3>Avaliações</h3>
                Lorem ipsum dolor sit amet.
                Sed animi iste sed saepe consectetur
                est alias enim eum sequi consequuntur
                est dignissimos atque.
            </div>

        </div>

        <div class="filme">
            <img src="" alt="imagem">

            <div class="info-filme">
                <h3>Título do Filme</h3>
                <span class="verde">9.8</span>
            </div>

            <div class="resumo-filme">
                <h3>Avaliações</h3>
                Lorem ipsum dolor sit amet.
                Sed animi iste sed saepe consectetur
                est alias enim eum sequi consequuntur
                est dignissimos atque.
            </div>

        </div>
    </main>

    <script>

        //TheMovie DB

        const API_KEY = 'api_key=47f84ba501b8d3b601451dc860e0b365';
        const BASE_URL = 'https://api.themoviedb.org/3';
        const API_URL = BASE_URL + '/discover/movie?sort_by=popularity.desc&' + API_KEY;
        const IMG_URL = 'https://image.tmdb.org/t/p/w500';
        const buscarURL = BASE_URL  + '/search/movie?' + API_KEY;


        const main = document.getElementById('main');
        const form = document.getElementById('form');
        const buscar = document.getElementById('buscar');

        getFilmes(API_URL);

        function getFilmes(url) {
            fetch(url).then(res => res.json()).then(data => {
                console.log(data.results);
                showFilmes(data.results);
            })

        }


        function showFilmes(data) {
            main.innerHTML = '';

            data.forEach(filme => {
                const { title, poster_path, vote_average, overview } = filme;
                const filmeEl = document.createElement('div');
                filmeEl.classList.add('filme');
                filmeEl.innerHTML = `

            <div class="adicionar">
                <input type="button" id="adicionar" class="btn-adicionar" onclick="adicionarFilme()" value="+">
            </div>
            
            <img src="${IMG_URL + poster_path}" alt="${title}">

            <div class="info-filme">
                <h3>${title}</h3>
                <span class="${getCor(vote_average)}">${vote_average}</span>
            </div>

            <div class="resumo-filme">
                <h3>Resumo</h3>
                ${overview}
            </div> 
        `
                main.appendChild(filmeEl);
            })

        }

        function getCor(vote) {
            if (vote >= 8) {
                return 'verde'
            } else if (vote >= 5) {
                return 'laranja'
            } else {
                return 'vermelho'
            }
        }

        function adicionarFilme($title) {
            alert('Filme adicionado a lista de desejos.');
            alert($title);
        }

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const buscarTermo = buscar.value;

            if(buscarTermo) {  //se buscar existe
                getFilmes(buscarURL+'&query='+buscarTermo);
            }else {
                getFilmes(API_URL);
            }
        })

    

        document.addEventListener("DOMContentLoaded", function (event) {
            console.log("Teste")
            getFilmes(API_URL);

        })
    </script>

</body>

</html>