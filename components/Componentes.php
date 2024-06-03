<?php

class Componentes {

    public $formulario = "
    <form action='land_massagem.php' method='post'>
        <div id='divForm'>
            <h1 id='titleWhite'>COMO PARTICIPAR DO NOSSO CLUB BELOVED DE BENEFÍCIOS</h1>
            <!-- <h2>Cadastre-se na nossa lista VIP para receber mais informações</h2> -->
            <input type='email' id='inEmail' name='inEmail' placeholder='DIGITE AQUI SEU E-MAIL' required>
            <input type='tel' id='inFone' name='inFone' placeholder='DIGITE AQUI SEU WHATSAPP' required>
            <button type='button' onclick='submitForm()' id='formButton'>
                <strong class='page6--text'>QUERO PARTICIPAR</strong>
            </button>
        </div>
    </form>";

    public $botaoQuero = "
    <button id='botaoQuero'>
        <a href='https://wa.me/+351913493604' target='_blank'>
            <h1 id='page1--button'>QUERO AGENDAR UMA SESSÃO<h1>
        </a>
    </button>";
    public $falenoWhats = "
    <a id='faleNoWhats' href='https://wa.me/+351913493604' target='_blank'>
        <img id='whatsLogo' src='../images/whatsapp-gold3.png'>
        <strong id='fale'>FALE CONOSCO</strong>
    </a>";

    public $header;
    public $footer = "
    <script src='https://kit.fontawesome.com/53a32fbcec.js' crossorigin='anonymous'></script>
        <img src='../images/logo-gold.png' id='imgHeader'>
        <div class='footerColumn'>
            <h3>Contatos</h3>
            <div class='rowDiv'>
                <i class='fas fa-phone'></i>
                (XX) XXXXX-XXXX<br>
            </div>
            <div class='rowDiv'>
                <i class='fa-brands fa-whatsapp'></i>
                (XX) XXXXX-XXXX<br>
            </div>
            <div class='rowDiv'>
                <i class='fas fa-envelope'></i>
                seuemail@dominio.com<br>
            </div>
            <div class='rowDiv'>
                <i class='fas fa-location-dot'></i>
                Seu endereço<br>
            </div>
            <div class='rowDiv'>
                <i class='fas fa-user-shield'></i>
                Política de Privacidade<br>
            </div>
            <div class='rowDiv'>
                <i class='fas fa-file-signature'></i>
                Termos e Condições<br>
            </div>
        </div>
        <div class='footerColumnRight'>
            <h3>Menu Rápido</h3>
            <a href='../massagem/massagem.php'>Tratamentos - Massagens</a>
            <a href='../rosto/rosto.php'>Tratamentos - Rosto</a>
            <a href='../corpo/corpo.php'>Tratamentos - Corpo</a>
            <a href='../formacao/formacao.php'>Formações</a>
            <a href='../belovedEquipamentos/belovedEquipamentos.php'>Sobre Nós</a>
            <a id='faleNoWhats' href='https://wa.me/+351913493604' target='_blank'>Fale Conosco</a>
        </div>";
    public function __construct() {
        $this->header = "<nav>
        <img src='../images/logo-gold.png' id='imgHeader' alt='Logo Gold'>
        <div class='menu-toggle' onclick='toggleMenu()'>
            <div class='barra'></div>
            <div class='barraGold'></div>
            <div class='barra'></div>
            <div class='barraGold'></div>
            <div class='barra'></div>
        </div>
        <menu id='menu-pc'>
            <ul><a href='../index.php'><strong>HOME</strong></a></ul>
            <ul><a href='../corpo/corpo.php'><strong>CORPO</strong></a></ul>
            <ul><a href='../massagem/massagem.php'><strong>MASSAGEM</strong></a></ul>
            <ul><a href='../rosto/rosto.php'><strong>ROSTO</strong></a></ul>
            <ul><a href='../clube/clube.php'><strong>CLUBE</strong></a></ul>
            <ul><a href='../formacao/formacao.php'><strong>FORMAÇÃO</strong></a></ul>
            <ul><a href='../belovedEquipamentos/belovedEquipamentos.php'><strong>BELOVED EQUIPAMENTOS</strong></a></ul>
            <ul class='header--ul' onmouseover='mouseOver()' onmouseout='mouseOut()' id='whatsList'>
                ".$this->falenoWhats."
            </ul>
        </menu>
        <menu id='menu-mobile'>
            <div class='menu-list'>
                <li><a href='../index.php'><strong>HOME</strong></a></li>
                <li><a href='../corpo/corpo.php'><strong>CORPO</strong></a></li>
                <li><a href='../massagem/massagem.php'><strong>MASSAGEM</strong></a></li>
                <li><a href='../rosto/rosto.php'><strong>ROSTO</strong></a></li>
                <li><a href='../clube/clube.php'><strong>CLUBE</strong></a></li>
                <li><a href='../formacao/formacao.php'><strong>FORMAÇÃO</strong></a></li>
                <li><a href='../belovedEquipamentos/belovedEquipamentos.php'><strong>BELOVED EQUIPAMENTOS</strong></a></li>
                <li id='whatsListCel'>
                    ".$this->falenoWhats."
                </li>
            </div>
        </menu>
    </nav>";
    }
}