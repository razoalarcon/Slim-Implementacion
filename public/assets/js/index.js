(function () {
    /** @brief : axios Llama a nuestra API con el query del index.php */
    axios.get('/')
        .then(function (response) {
            //handle success
            //console.log(response.data);
            let template = ``;
            for (const iterator of response.data) {
                template += `
<div class="column">
                <!--Your templeate here-->
                `;
            }
            document.querySelector('#container-cards').innerHTML = template;
        })

    //Segunda vista
    axios.get('/api/farmacias')
        .then(function (response) {
            let template = ``;
            for (const iterator of response.data) {
                template += `
<div class="column">
                <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                ${iterator.nombre}
                            </p>
                            <!-- <a href="#" class="card-header-icon" aria-label="more options">-->
                            <!--      <span class="icon">-->
                            <!--        <i class="fas fa-angle-down" aria-hidden="true"></i>-->
                            <!--      </span>-->
                            <!-- </a>-->
                        </header>
                        <div class="card-content">
                            <div class="content">

                                <a href="#"><strong>id:</strong> ${iterator.id_farmacia}</a></a>
                                <br>
                                <p><strong>Categorias</strong>: ${iterator.categoria}</p>
                        
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">Editar</a>
                            <a href="#" class="card-footer-item">Eliminar</a>
                        </footer>
                    </div>
                    </div>
                `;
            }
            //Seleccionar el contenedor
            document.querySelector('#container-cards').innerHTML = template;
        })
        .catch(function (error) {
            // handle error
            document.querySelector('#empty-msg').innerHTML = "No existen registros";
            console.log(error);
        });
})();
