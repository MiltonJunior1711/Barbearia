<?php require_once("cabecalho.php") ?>

<style>
    #main-header {
      background-color: transparent !important; /* Aplica !important diretamente no CSS */
    }
</style>

<?php 
$query = $pdo->query("SELECT * FROM textos_index ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
 ?>
<!-- slider section -->
<section id="header" class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php 
for($i=0; $i < $total_reg; $i++){
  foreach ($res[$i] as $key => $value){}
  $id = $res[$i]['id'];
  $titulo = $res[$i]['titulo'];
  $descricao = $res[$i]['descricao'];

  $descricaoF = mb_strimwidth($descricao, 0, 50, "...");

  if($i == 0){
    $ativo = 'active';
  }else{
    $ativo = '';
  }
 ?>

            <div class="carousel-item <?php echo $ativo ?>">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="detail-box">
                                <h1>
                                    <?php echo $titulo ?>
                                </h1>
                                <p>
                                    <?php echo $descricao ?>
                                </p>
                                <div class="btn-box">
                                    <a href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $tel_whatsapp ?>"
                                        target="_blank" class="btn1">
                                        Contate-nos
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
}
 ?>


        </div>
        <div class="container">
            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left icon" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                    <i class="fa fa-arrow-right icon" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end slider section -->

<?php } ?>

</div>


<!-- product section -->

<section id="product_section" class="product_section layout_padding">
    <!-- START Widget WhastApp hospedagemwordpresspro -->
    <a href="https://api.whatsapp.com/send?phone=<?php echo $tel_whatsapp ?>&text=Olá!" id="waurlsite" class="bt-whatsApp"
        target="_blank" style="right:25px; position:fixed;width:60px;height:60px;bottom:40px;z-index:100;">
        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pjxzdmcgdmlld0JveD0iMjYxOSA1MDYgMTIwIDEyMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48c3R5bGU+CiAgICAgIC5jbHMtMSB7CiAgICAgICAgZmlsbDogIzI3ZDA0NTsKICAgICAgfQoKICAgICAgLmNscy0yLCAuY2xzLTUgewogICAgICAgIGZpbGw6IG5vbmU7CiAgICAgIH0KCiAgICAgIC5jbHMtMiB7CiAgICAgICAgc3Ryb2tlOiAjZmZmOwogICAgICAgIHN0cm9rZS13aWR0aDogNXB4OwogICAgICB9CgogICAgICAuY2xzLTMgewogICAgICAgIGZpbGw6ICNmZmY7CiAgICAgIH0KCiAgICAgIC5jbHMtNCB7CiAgICAgICAgc3Ryb2tlOiBub25lOwogICAgICB9CiAgICA8L3N0eWxlPjwvZGVmcz48ZyBkYXRhLW5hbWU9Ikdyb3VwIDM2IiBpZD0iR3JvdXBfMzYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDIzMDAgNzMpIj48Y2lyY2xlIGNsYXNzPSJjbHMtMSIgY3g9IjYwIiBjeT0iNjAiIGRhdGEtbmFtZT0iRWxsaXBzZSAxOCIgaWQ9IkVsbGlwc2VfMTgiIHI9IjYwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMTkgNDMzKSIvPjxnIGRhdGEtbmFtZT0iR3JvdXAgMzUiIGlkPSJHcm91cF8zNSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMjU0IDM4NikiPjxnIGRhdGEtbmFtZT0iR3JvdXAgMzQiIGlkPSJHcm91cF8zNCI+PGcgY2xhc3M9ImNscy0yIiBkYXRhLW5hbWU9IkVsbGlwc2UgMTkiIGlkPSJFbGxpcHNlXzE5IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5NCA3NSkiPjxjaXJjbGUgY2xhc3M9ImNscy00IiBjeD0iMzEuNSIgY3k9IjMxLjUiIHI9IjMxLjUiLz48Y2lyY2xlIGNsYXNzPSJjbHMtNSIgY3g9IjMxLjUiIGN5PSIzMS41IiByPSIyOSIvPjwvZz48cGF0aCBjbGFzcz0iY2xzLTMiIGQ9Ik0xNDI0LDE5MWwtNC42LDE2LjMsMTYuOS00LjcuOS01LjItMTEsMy41LDIuOS0xMC41WiIgZGF0YS1uYW1lPSJQYXRoIDEyNiIgaWQ9IlBhdGhfMTI2IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTMyNSAtNjgpIi8+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTI2Niw5MGMwLS4xLDMuNS0xMS43LDMuNS0xMS43bDguNCw3LjlaIiBkYXRhLW5hbWU9IlBhdGggMTI3IiBpZD0iUGF0aF8xMjciIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0xMTY1IDQzKSIvPjwvZz48cGF0aCBjbGFzcz0iY2xzLTMiIGQ9Ik0xNDM5LjMsMTYwLjZhOS40LDkuNCwwLDAsMC0zLjksNi4xYy0uNSwzLjksMS45LDcuOSwxLjksNy45YTUwLjg3Niw1MC44NzYsMCwwLDAsOC42LDkuOCwzMC4xODEsMzAuMTgxLDAsMCwwLDkuNiw1LjEsMTEuMzc4LDExLjM3OCwwLDAsMCw2LjQuNiw5LjE2Nyw5LjE2NywwLDAsMCw0LjgtMy4yLDkuODUxLDkuODUxLDAsMCwwLC42LTIuMiw1Ljg2OCw1Ljg2OCwwLDAsMCwwLTJjLS4xLS43LTcuMy00LTgtMy44cy0xLjMsMS41LTIuMSwyLjYtMS4xLDEuNi0xLjksMS42LTQuMy0xLjQtNy42LTQuNGExNS44NzUsMTUuODc1LDAsMCwxLTQuMy02cy42LS43LDEuNC0xLjhhNS42NjQsNS42NjQsMCwwLDAsMS4zLTIuNGMwLS41LTIuOC03LjYtMy41LTcuOUExMS44NTIsMTEuODUyLDAsMCwwLDE0MzkuMywxNjAuNloiIGRhdGEtbmFtZT0iUGF0aCAxMjgiIGlkPSJQYXRoXzEyOCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTEzMjYuMzMyIC02OC40NjcpIi8+PC9nPjwvZz48L3N2Zz4="
            alt="" width="60px">
    </a>
    <span id="alertWapp"
        style="right:30px; visibility: hidden; position:fixed;	width:17px;	height:17px;bottom:90px; background:red;z-index:101; font-size:11px;color:#fff;text-align:center;border-radius: 50px; font-weight:bold;line-height: normal; ">
        1 </span>
    <div id="msg1"
        style="right: 90px; visibility: visible; background: #1EBC59; color: #fff; position: fixed; width: 200px; bottom: 52px; text-align: center; font-size: 13px; line-height: 31px; height: 32px; border-radius: 100px; z-index: 100; ">
        Dúvidas?</div>
    <script type="text/javascript">
    function showIt2() {
        document.getElementById("msg1").style.visibility = "visible";
    }
    setTimeout("showIt2()", 5000);

    function hiddenIt() {
        document.getElementById("msg1").style.visibility = "hidden";
    }
    setTimeout("hiddenIt()", 15000);

    function showIt3() {
        document.getElementById("msg1").style.visibility = "visible";
    }
    setTimeout("showIt3()", 25000);
    msg1.onclick = function() {
        document.getElementById('msg1').style.visibility = "hidden";
    };

    function alertW() {
        document.getElementById("alertWapp").style.visibility = "visible";
    }
    setTimeout("alertW()", 15000);
    </script>
    <!-- END Widget WhastApp -->

    <div class="container">
        <div class="heading_container heading_center ">
            <h2 class="">
                Nossos Serviços
            </h2>
            <p class="col-lg-8 px-0">
                <?php 
          $query = $pdo->query("SELECT * FROM cat_servicos ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){ 
for($i=0; $i < $total_reg; $i++){
  foreach ($res[$i] as $key => $value){}
  $id = $res[$i]['id'];
  $nome = $res[$i]['nome'];

  echo $nome;

  if($i < ($total_reg - 1)){
    echo ' / ';
  }

}

}

$query = $pdo->query("SELECT * FROM servicos where ativo = 'Sim' and nome != 'folga'ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){ 
?>
            </p>
        </div>
        <div class="product_container">
            <div class="product_owl-carousel owl-carousel owl-theme ">

                <?php 
for($i=0; $i < $total_reg; $i++){
  foreach ($res[$i] as $key => $value){}
 
  $id = $res[$i]['id'];
  $nome = $res[$i]['nome'];   
  $valor = $res[$i]['valor'];
  $foto = $res[$i]['foto'];
   $valorF = number_format($valor, 2, ',', '.');
   $nomeF = mb_strimwidth($nome, 0, 20, "...");
 ?>

                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="sistema/painel/img/servicos/<?php echo $foto ?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                <?php echo $nomeF ?>
                            </h4>
                            <h6 class="price">
                                <span class="new_price">
                                    R$ <?php echo $valorF ?>
                                </span>

                            </h6>
                            <a href="agendamentos">
                                Agendar
                            </a>
                        </div>
                    </div>
                </div>

                <?php 
}
 ?>


            </div>
        </div>

        <?php } ?>
    </div>
</section>

<!-- product section ends -->

<!-- about section -->

<section id="about" class="about_section ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 px-0">
                <div class="img-box ">
                    <?php if($url_video != "" and $posicao_video == 'sobre'){
              echo '<iframe width="100%" height="350" src="'.$url_video.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
            }else{?>
                    <img src="images/<?php echo $imagem_sobre ?>" class="box_img" alt="about img">
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="detail-box ">
                    <div class="heading_container">
                        <h2 class="">
                            Sobre Nós
                        </h2>
                    </div>
                    <p class="detail_p_mt">
                        <?php echo $texto_sobre ?>
                    </p>
                    <a href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $tel_whatsapp ?>" class="">
                        Mais Informações
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div style="margin-top: 20px">
    <?php if($url_video != "" and $posicao_video == 'abaixo'){
              echo '<iframe class="video_mobile" width="100%" src="'.$url_video.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
            }
    ?>
</div>

<!-- about section ends -->

<!-- product section -->

<?php 
$query = $pdo->query("SELECT * FROM produtos where estoque > 0 and valor_venda >  0 ORDER BY id desc limit 8");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){ 
   ?>

<section id="products" class="product_section layout_padding">
    <div class="container-fluid">
        <div class="heading_container heading_center ">
            <h2 class="">
                Nossos Produtos
            </h2>

        </div>
        <div class="row">

            <?php 
for($i=0; $i < $total_reg; $i++){
  foreach ($res[$i] as $key => $value){}
 
  $id = $res[$i]['id'];
  $nome = $res[$i]['nome'];   
  $valor = $res[$i]['valor_venda'];
  $foto = $res[$i]['foto'];
  $descricao = $res[$i]['descricao'];
   $valorF = number_format($valor, 2, ',', '.');
 $nomeF = mb_strimwidth($nome, 0, 23, "...");

 ?>

            <div class="col-sm-6 col-md-3">
                <div class="box">
                    <div class="img-box">
                        <img src="sistema/painel/img/produtos/<?php echo $foto ?>" title="<?php echo $descricao ?>">
                    </div>
                    <div class="detail-box">
                        <h5>
                            <?php echo $nomeF ?>
                        </h5>
                        <h6 class="price">
                            <span class="new_price">
                                R$ <?php echo $valorF ?>
                            </span>

                        </h6>
                        <a target="_blank"
                            href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $tel_whatsapp ?>&text=Ola, gostaria de saber mais informações sobre o produto <?php echo $nome ?>">
                            Comprar Agora
                        </a>
                    </div>
                </div>
            </div>

            <?php } ?>


        </div>
        <div class="btn-box">
            <a href="produtos">
                Ver mais Produtos
            </a>
        </div>
    </div>
</section>

<?php } ?>

<!-- product section ends -->


<!-- contact section -->
<section id="contact" class="contact_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container">
            <h2>
                Contate-nos
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form id="form-email">
                        <div>
                            <input type="text" name="nome" placeholder="Seu Nome" required />
                        </div>
                        <div>
                            <input type="text" name="telefone" id="telefone" placeholder="Seu Telefone" required />
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Seu Email" required />
                        </div>
                        <div>
                            <input type="text" name="mensagem" class="message-box" placeholder="Mensagem" required />
                        </div>
                        <div class="btn_box">
                            <button>
                                Enviar
                            </button>
                        </div>
                    </form>

                    <br>
                    <div id="mensagem"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <?php echo $mapa ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact section -->

<!-- client section -->
<?php 
$query = $pdo->query("SELECT * FROM comentarios where ativo = 'Sim' ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){ 
 ?>
<section class="client_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container">
            <h2>
                Depoimento dos nossos Clientes
            </h2>
        </div>
        <div class="client_container">
            <div class="carousel-wrap">
                <div class="owl-carousel client_owl-carousel">

                    <?php 
            for($i=0; $i < $total_reg; $i++){
          foreach ($res[$i] as $key => $value){}
 
          $id = $res[$i]['id'];
          $nome = $res[$i]['nome'];   
           $texto = $res[$i]['texto'];
           $foto = $res[$i]['foto'];   
             ?>

                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="sistema/painel/img/comentarios/<?php echo $foto ?>" alt="" class="img-1">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    <?php echo $nome ?>
                                </h5>

                                <p>
                                    <?php echo $texto ?>
                                </p>
                            </div>
                        </div>
                    </div>


                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <div class="btn-box2">
        <a href="" data-toggle="modal" data-target="#modalComentario">
            Inserir Depoimento
        </a>
    </div>

</section>

<?php } ?>

<!-- end client section -->

<?php require_once("rodape.php") ?>










<!-- Modal Depoimentos -->
<div class="modal fade" id="modalComentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserir Depoimento
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control" id="nome_cliente" name="nome" placeholder="Nome"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Texto <small>(Até 500 Caracteres)</small></label>
                                <textarea maxlength="500" class="form-control" id="texto_cliente" name="texto"
                                    placeholder="Texto Comentário" required> </textarea>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Foto</label>
                                <input class="form-control" type="file" name="foto" onChange="carregarImg();" id="foto">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="divImg">
                                <img src="sistema/painel/img/comentarios/sem-foto.jpg" width="80px" id="target">
                            </div>
                        </div>

                    </div>



                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="cliente" value="1">

                    <br>
                    <small>
                        <div id="mensagem-comentario" align="center"></div>
                    </small>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Inserir</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $(window).on('scroll', function() {
        var scrollPos = $(window).scrollTop();
        var header = $('#main-header');
        var sliderSectionHeight = $('#product_section').outerHeight();
        var servicesSectionHeight = $('#about').outerHeight();
        var aboutSectionHeight = $('#products').outerHeight();
        var productsSectionHeight = $('#contact').outerHeight();
        //var contactSectionHeight = $('#contact-section').outerHeight();

        if (scrollPos < sliderSectionHeight) {
            header.css('background-color', 'transparent');
        } else if (scrollPos >= sliderSectionHeight && scrollPos < sliderSectionHeight +
            servicesSectionHeight) {
            header.css('background-color', '#0e3746');

        } else if (scrollPos >= sliderSectionHeight + servicesSectionHeight && scrollPos <
            sliderSectionHeight + servicesSectionHeight + aboutSectionHeight) {
            header.css('background-color', 'transparent');

        } else if (scrollPos >= sliderSectionHeight + servicesSectionHeight + aboutSectionHeight &&
            scrollPos < sliderSectionHeight + servicesSectionHeight + aboutSectionHeight +
            productsSectionHeight) {
            header.css('background-color', '#0e3746');

        } else if (scrollPos >= sliderSectionHeight + servicesSectionHeight + aboutSectionHeight +
            productsSectionHeight) {
            header.css('background-color', '#0e3746'); // Cor para a seção de contato
        }
    });
});
</script>



<script type="text/javascript">
$("#form-email").submit(function() {

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: 'ajax/enviar-email.php',
        type: 'POST',
        data: formData,

        success: function(mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Enviado com Sucesso") {
                $('#mensagem').addClass('text-success')
                $('#mensagem').text(mensagem)

            } else {

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});
</script>



<script type="text/javascript">
function carregarImg() {
    var target = document.getElementById('target');
    var file = document.querySelector("#foto").files[0];

    var reader = new FileReader();

    reader.onloadend = function() {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}
</script>

<script type="text/javascript">
$("#form").submit(function() {

    event.preventDefault();
    var formData = new FormData(this);


    $.ajax({
        url: 'sistema/painel/paginas/comentarios/salvar.php',
        type: 'POST',
        data: formData,

        success: function(mensagem) {
            $('#mensagem-comentario').text('');
            $('#mensagem-comentario').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

                $('#mensagem-comentario').addClass('text-success')
                $('#mensagem-comentario').text('Comentário Enviado para Aprovação!')
                $('#nome_cliente').val('');
                $('#texto_cliente').val('');

            } else {

                $('#mensagem-comentario').addClass('text-danger')
                $('#mensagem-comentario').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});
</script>

<script>
$(document).ready(function() {
    var overlay = document.querySelector('.overlay');
    overlay.style.setProperty('background', 'linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0))',
        'important');
});
</script>