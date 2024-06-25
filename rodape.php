<?php require_once("sistema/conexao.php");
require_once("cabecalho.php"); ?>
<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="footer_content">
            <div class="row">
                <div class="col-md-5 col-lg-5 footer-col">
                    <div class="footer_detail">
                        <a href="index.html">
                            <h4><?php echo $nome_sistema; ?></h4>
                        </a>
                        <p><?php echo $texto_rodape; ?></p>
                    </div>
                </div>
                <div class="col-md-7 col-lg-4">
                    <h4>Contatos</h4>
                    <div class="contact_nav footer-col">
                        <a href="">
                            <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                            <span><?php echo $endereco_sistema; ?></span>
                        </a>
                        <a href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $tel_whatsapp; ?>" target="_blank">
                            <i class="fa fa-phone icon" aria-hidden="true"></i>
                            <span>Whatsapp : <?php echo $whatsapp_sistema; ?></span>
                        </a>
                        <a href="mailto:<?php echo $email_sistema; ?>">
                            <i class="fa fa-envelope icon" aria-hidden="true"></i>
                            <span>Email : <?php echo $email_sistema; ?></span>
                        </a>
                        <a href="https://www.instagram.com/<?php echo $instagram_sistema; ?>" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <span>Instagram : <?php echo $instagram_sistema ?></span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3" id="installBanner">
                    <!-- <div class="footer_form footer-col">
                        <h4>CADASTRE-SE</h4>
                        <form id="form_cadastro">
                            <input type="text" name="telefone" id="telefone_rodape"
                                placeholder="Seu Telefone DDD + número" />
                            <input type="text" name="nome" placeholder="Seu Nome" />
                            <button type="submit">Cadastrar</button>
                        </form>
                        <br><small>
                            <div id="mensagem-rodape"></div>
                        </small>
                    </div>-->
        
                    <h4>Melhore sua experiência!</h4>
                    <span>Adicione este site à sua tela inicial para acesso rápido e fácil sempre que
                        precisar.
                    </span>
                    <br>
                    <br>
                    <button style="width: 100%;" id="installButton" class="botao-criar-atalho" disabled>Criar
                        Atalho</button>
                   
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer section -->

<!-- jQuery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- custom js -->
<script src="js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->
<!-- Mascaras JS -->
<script type="text/javascript" src="sistema/painel/js/mascaras.js"></script>
<!-- Ajax para funcionar Mascaras JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js">
</script>

<script type="text/javascript">
$("#form_cadastro").submit(function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: 'ajax/cadastrar.php',
        type: 'POST',
        data: formData,
        success: function(mensagem) {
            $('#mensagem-rodape').text('');
            if (mensagem.trim() == "Salvo com Sucesso") {
                $('#mensagem-rodape').text(mensagem);
            } else {
                $('#mensagem-rodape').text(mensagem);
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });
});
</script>

<script src="pwacompat.js"></script>
<script type="text/javascript">
console.log("Chegou na função de verificação do PWA.");
let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
    console.log("Evento beforeinstallprompt detectado.");
    e.preventDefault();
    deferredPrompt = e;
});

function gerarPWA() {
    console.log("Função gerarPWA chamada.");
    if (deferredPrompt) {
        console.log("Deferred prompt existe, mostrando prompt.");
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
                console.log('Usuário aceitou a instalação');
            } else {
                console.log('Usuário rejeitou a instalação');
            }
            deferredPrompt = null;
        }).catch((error) => {
            console.error('Erro ao processar a escolha do usuário:', error);
        });
    } else {
        let userAgent = navigator.userAgent || navigator.vendor || window.opera;

        if (/android/i.test(userAgent)) {
            alert(

                "Verifique se o ícone da aplicação está na sua área de aplicativos. Se não é só seguir esse passo a passo: \n\n" +
                "1. Toque no ícone de três pontos no canto superior direito.\n" +
                "2. Selecione 'Adicionar à tela inicial'.\n" +
                "3. Siga as instruções para adicionar o atalho."
            );
        } else if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            alert(
                "Verifique se o ícone da aplicação está na sua área de aplicativos. Se não é só seguir esse passo a passo: \n\n" +
                "1. Toque no ícone de compartilhamento na parte inferior da tela.\n" +
                "2. Selecione 'Adicionar à Tela de Início'.\n" +
                "3. Siga as instruções para adicionar o atalho."
            );
        } else {
            alert(
                "Verifique se o ícone da aplicação está na sua área de trabalho. Se não é só seguir esse passo a passo: \n\n" +
                "1. Clique no ícone de três pontos no canto superior direito do navegador.\n" +
                "2. Selecione 'Mais ferramentas' > 'Criar atalho...'.\n" +
                "3. Marque a opção 'Abrir como janela' se disponível e clique em 'Criar'."
            );
        }
    }
}

function checkIfAppInstalled() {
    // Verifique se o PWA está instalado
    const isInstalled = (window.matchMedia('(display-mode: standalone)').matches) || (window.navigator.standalone);
    const installButton = document.getElementById('installButton');
    if (installButton) {
        if (isInstalled) {
            // Se estiver instalado, mostre uma mensagem
            console.log('Aplicação já está instalada');
            installButton.innerHTML = 'Aplicação já instalada';
            installButton.disabled = true;
        } else {
            // Caso contrário, mantenha a mensagem original e habilite o botão
            installButton.innerHTML = 'Criar Atalho';
            installButton.disabled = false;
        }
    }
}

window.addEventListener('appinstalled', () => {
    console.log('PWA foi instalada');
    const installButton = document.getElementById('installButton');
    if (installButton) {
        installButton.innerHTML = 'Aplicação já instalada';
        installButton.disabled = true;
    }
});

// Adiciona logs para ajudar na depuração
document.addEventListener('visibilitychange', () => {
    console.log('Visibilidade do documento mudou:', document.visibilityState);
});

window.addEventListener('online', () => {
    console.log('Conexão de rede restaurada.');
});

window.addEventListener('offline', () => {
    console.log('Conexão de rede perdida.');
});

document.addEventListener('DOMContentLoaded', () => {
    console.log('Página carregada completamente.');
    // Adicionar event listener ao botão apenas após a página estar carregada
    const installButton = document.getElementById('installButton');
    if (installButton) {
        installButton.removeAttribute('disabled');
        installButton.addEventListener('click', gerarPWA);
    }
    checkIfAppInstalled(); // Verificar se o app está instalado após o carregamento
});

// Verificar imediatamente após o script ser executado
checkIfAppInstalled();
</script>