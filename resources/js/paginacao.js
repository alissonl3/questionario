var _args;
var idGridPaginar;
var idUlPaginacao;
var qtdItemPagina;
var qtdItemAgrupamento;
var primeiraUltimaVisiveis;
var anteriorProximaVisiveis;
var qtdTotalItens;
var pagina = 1;
var qtd = 0;


var PAGINACAO = PAGINACAO || (function () {
    _args = {};
    return {
        init: function (Args) {
            _args = Args;
            idGridPaginar = _args[0];
            idUlPaginacao = _args[1];
            qtdItemPagina = _args[2];
            qtdItemAgrupamento = _args[3];
            primeiraUltimaVisiveis = _args[4];
            anteriorProximaVisiveis = _args[5];
        },
        execscript: function () { 
            qtdTotalItens = $('#' + idGridPaginar + ' tr').length;
            EnumerarPagina(idGridPaginar, pagina, qtd, qtdItemPagina);
            Paginar(idGridPaginar, idUlPaginacao, 1, qtdTotalItens, qtdItemPagina, primeiraUltimaVisiveis, anteriorProximaVisiveis);
        }
    }
}());


function EnumerarPagina(_idGridPaginar, _pagina, _qtd, _qtdItemPagina) {
    $('#' + _idGridPaginar + ' tr').each(function () {
        _qtd++;
        if (_qtd <= _qtdItemPagina) {
        }
        else {
            _qtd = 1;
            _pagina++;
        }
        $(this).attr('numpagina', _pagina);
    });
}

function Paginar(_idGridPaginar, _idUlPaginacao, _index, _qtdTotalItens, _qtdItemPagina, _primeiraUltimaVisiveis, _anteriorProximaVisiveis) {

    var irPara;
    var _qtdPagina = (_qtdTotalItens / _qtdItemPagina);
    var resto = _qtdPagina % 2;
    var arredondado = Math.round(_qtdPagina);

    if (_qtdPagina > arredondado) {
        _qtdPagina = arredondado + 1;
    }
    else {
        _qtdPagina = arredondado;
    }

    irPara = _index;
    if (irPara == null) {
        irPara = 1;
    }

    if (_qtdPagina > 1) {
        //SOMA SE AS 2 PRIMEIRAS E DUAS ULTIMAS FIXAS
        if (_qtdPagina <= qtdItemAgrupamento + 4) {
            
            $('#' + _idGridPaginar + ' > tr[numpagina!="' + _index + '"]').hide();
            $('#' + _idUlPaginacao).empty()

            if (_primeiraUltimaVisiveis) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + 1 + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + 1 + ")" + ">Primeira</span> </li>");
            }
            if (_anteriorProximaVisiveis) {
                $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao btnAnterior" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>Anterior</span> </li>');
            }
            for (var i = 1; i < _qtdPagina + 1; i++) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + i + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + i + ")" + ">" + i + "</span> </li>");
            }
            if (_anteriorProximaVisiveis) {
                $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao btnProxima verde" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>Proxima</span> &nbsp; &nbsp;</li>');
            }
            if (_primeiraUltimaVisiveis) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + _qtdPagina + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + _qtdPagina + ")" + ">Ultima</span> </li>");
            }
        }
        else if (irPara == 1 || irPara == 2 || irPara == 3) {
            
            $('#' + _idGridPaginar + ' > tr[numpagina!="' + _index + '"]').hide();
            $('#' + _idUlPaginacao).empty()

            if (_primeiraUltimaVisiveis) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + 1 + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + 1 + ")" + ">Primeira</span> </li>");
            }
            if (_anteriorProximaVisiveis) {
                $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao btnAnterior" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>Anterior</span> ;</li>');
            }

            for (var i = 1; i < qtdItemAgrupamento + 3; i++) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + i + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "'," + "'" + _idUlPaginacao + "'" + "," + i + ")" + ">" + i + "</span> </li>");
            }
            //CRIA DROPDOWN
            var dropDown = '';
            dropDown += '<select class="ddlPaginacao" style="width:70px;display:none;" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>';
            for (var i = 1; i < _qtdPagina + 1; i++) {
                dropDown += '<option value="' + i + '">' + i + '</option>';
            }
            dropDown += '</select>';

            $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao verde btnAbrirDropPaginaFrente" style="display:inline;" ul=' + _idUlPaginacao + '>...</span>' + dropDown + ' </li>');
            $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + (_qtdPagina - 1) + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + (_qtdPagina - 1) + ")" + ">" + (_qtdPagina - 1) + "</span> </li>");
            $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + _qtdPagina + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + _qtdPagina + ")" + ">" + _qtdPagina + "</span> </li>");

            if (_anteriorProximaVisiveis) {
                $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao btnProxima verde" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>Proxima</span> </li>');
            }
            if (_primeiraUltimaVisiveis) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + _qtdPagina + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + _qtdPagina + ")" + ">Ultima</span>  </li>");
            }
        }
        else if (irPara >= 3 && irPara < (_qtdPagina - qtdItemAgrupamento)) {
            
            //CRIA DROPDOWN
            var dropDown = '';
            dropDown += '<select class="ddlPaginacao" style="width:70px; display:none;" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>';
            for (var i = 1; i < _qtdPagina + 1; i++) {
                dropDown += '<option value="' + i + '">' + i + '</option>';
            }
            dropDown += '</select>';
            $('#' + _idGridPaginar + ' > tr[numpagina!="' + _index + '"]').hide();
            $('#' + _idUlPaginacao).empty()
            if (_primeiraUltimaVisiveis) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + 1 + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + 1 + ")" + ">Primeira</span> </li>");
            }
            if (_anteriorProximaVisiveis) {
                $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao btnAnterior" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>Anterior</span> </li>');
            }            

            $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + 1 + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + 1 + ")" + ">" + 1 + "</span> </li>");
            $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + 2 + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + 2 + ")" + ">" + 2 + "</span> </li>");
            $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao verde btnAbrirDropPaginaFrente" style="display:inline;" ul=' + _idUlPaginacao + '>...</span>' + dropDown + ' </li>');
            for (var i = 1; i < qtdItemAgrupamento + 1; i++) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + ((irPara - 1) + i) + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + ((irPara - 1) + i) + ")" + ">" + ((irPara - 1) + i) + "</span> </li>");
            }
            //CRIA DROPDOWN
            var dropDown2 = '';
            dropDown2 += '<select class="ddlPaginacao2" style="width:70px;display:none;" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>';
            for (var i = 1; i < _qtdPagina + 1; i++) {
                dropDown2 += '<option value="' + i + '">' + i + '</option>';
            }
            dropDown2 += '</select>';
            $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao verde btnAbrirDropPaginaTras" style="display:inline;" ul = ' + _idUlPaginacao + '>...</span>' + dropDown2 + ' </li>');
            $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + (_qtdPagina - 1) + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + (_qtdPagina - 1) + ")" + ">" + (_qtdPagina - 1) + "</span> </li>");
            $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + _qtdPagina + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + _qtdPagina + ")" + ">" + _qtdPagina + "</span> </li>");
            if (_anteriorProximaVisiveis) {
                $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao btnProxima verde" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>Proxima</span> </li>');
            }
            if (_primeiraUltimaVisiveis) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + i + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + _qtdPagina + ")" + ">Ultima</span> </li>");
            }
        }
        else {
            
            $('#' + _idGridPaginar + ' > tr[numpagina!="' + _index + '"]').hide();
            $('#' + _idUlPaginacao).empty();

            if (_primeiraUltimaVisiveis) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + 1 + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + 1 + ")" + ">Primeira</span> </li>");
            }
            if (_anteriorProximaVisiveis) {
                $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao btnAnterior verde" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>Anterior</span> </li>');
            }

            $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + 1 + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + 1 + ")" + ">" + 1 + "</span> </li>");
            $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + 2 + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + 2 + ")" + ">" + 2 + "</span> </li>");
            //CRIA DROPDOWN                            
            var dropDown = '';
            dropDown += '<select class="ddlPaginacao" style="width:70px;display:none;" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>';
            for (var i = 1; i < _qtdPagina + 1; i++) {
                dropDown += '<option value="' + i + '">' + i + '</option>';
            }
            dropDown += '</select>';
            $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao verde btnAbrirDropPaginaFrente" style="display:inline;" ul=' + _idUlPaginacao + '>...</span>' + dropDown + ' </li>');
            for (var i = (_qtdPagina - (qtdItemAgrupamento + 1)) ; i <= _qtdPagina; i++) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + i + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + i + ")" + ">" + i + "</span> </li>");
            }
            if (_anteriorProximaVisiveis) {
                $('#' + _idUlPaginacao).append('<li class="li-display-inline"><span class="paginacao btnProxima verde" referencia=' + _idGridPaginar + ' ul=' + _idUlPaginacao + '>Proxima</span> </li>');
            }
            if (_primeiraUltimaVisiveis) {
                $('#' + _idUlPaginacao).append("<li class='li-display-inline' indice=" + i + "><span class='paginacao verde' onclick=" + "Ir('" + _idGridPaginar + "','" + _idUlPaginacao + "'," + _qtdPagina + ")" + ">Ultima</span>  </li>");
            }
        }
        $('#' + _idUlPaginacao + ' > li[indice=1] > span').attr('class', 'paginacao-selecionada');
        $('#' + _idUlPaginacao + ' span:contains("Anterior")').attr('class', 'btnAnterior paginacao cinza');
        $('#' + _idUlPaginacao + ' span:contains("Primeira")').attr('class', 'paginacao cinza');
    }
    else {
        $('#' + _idUlPaginacao).empty();
    }




    //CHANGE PAGINA PELO DROPDOWN    
    $('#' + _idUlPaginacao + ' .ddlPaginacao').change(function () {
        var referenciaTable = $(this).attr('referencia');
        var ul = $(this).attr('ul');
        irPara = this.value;
        Paginar(referenciaTable, ul, this.value, _qtdTotalItens, _qtdItemPagina, _primeiraUltimaVisiveis, _anteriorProximaVisiveis);
        Ir(referenciaTable, ul, this.value);
    });

    //CHANGE PAGINA PELO DROPDOWN
    $('#' + _idUlPaginacao + ' .ddlPaginacao2').change(function () {
        var referenciaTable = $(this).attr('referencia');
        var ul = $(this).attr('ul');
        var ul = $(this).attr('ul');
        irPara = this.value;
        Paginar(referenciaTable, ul, this.value, _qtdTotalItens, _qtdItemPagina, _primeiraUltimaVisiveis, _anteriorProximaVisiveis);
        Ir(referenciaTable, ul, this.value);
    });

    $('#' + _idUlPaginacao + ' .btnAbrirDropPaginaFrente').click(function () {
        var ul = $(this).attr('ul');
        $('#' + ul + ' .ddlPaginacao').css('display', 'inline');
        $('#' + ul + ' .btnAbrirDropPaginaFrente').css('display', 'none');
    });

    $('#' + _idUlPaginacao + ' .btnAbrirDropPaginaTras').click(function () {
        var ul = $(this).attr('ul');
        $('#' + ul + ' .ddlPaginacao2').css('display', 'inline');
        $('#' + ul + ' .btnAbrirDropPaginaTras').css('display', 'none');
    });

    $('#' + _idUlPaginacao + ' .btnAnterior').click(function () {
        for (var i = 0; i < 1; i++) {
            var referenciaTable = $(this).attr('referencia');
            var ul = $(this).attr('ul');
            if ((parseInt($('#' + ul + ' span.paginacao-selecionada').text(), 10) - 1) >= 1) {
                irPara = parseInt($('#' + ul + ' span.paginacao-selecionada').text(), 10) - 1;
                Paginar(referenciaTable, ul, irPara, _qtdTotalItens, _qtdItemPagina, _primeiraUltimaVisiveis, _anteriorProximaVisiveis);
                Ir(referenciaTable, ul, irPara);
            }
        }
    });

    $('#' + _idUlPaginacao + ' .btnProxima').click(function () {
        var referenciaTable = $(this).attr('referencia');
        var ul = $(this).attr('ul');
        if ((parseInt($('#' + ul + ' span.paginacao-selecionada').text(), 10) + 1) <= _qtdPagina) {
            irPara = parseInt($('#' + ul + ' span.paginacao-selecionada').text(), 10) + 1;
            Paginar(referenciaTable, ul, irPara, _qtdTotalItens, _qtdItemPagina, _primeiraUltimaVisiveis, _anteriorProximaVisiveis);
            Ir(referenciaTable, ul, irPara);
        }
    });
}

function Ir(_idGridPaginar, _idUlPaginacao, _index) {

    _idGridPaginar = _idGridPaginar.trim();

    $('#' + _idGridPaginar + ' > tr[numpagina="' + _index + '"]').show();
    $('#' + _idGridPaginar + ' > tr[numpagina!="' + _index + '"]').hide();
    $('#' + _idUlPaginacao + ' > li > span:not(:contains("..."))').attr('class', 'paginacao verde');
    $('#' + _idUlPaginacao + ' > li[indice=' + _index + '] > span').attr('class', 'paginacao-selecionada');


    if (_index > 1) {
        $('#' + _idUlPaginacao + ' span:contains("Anterior")').attr('class', 'btnAnterior paginacao verde');
    }
    else {
        $('#' + _idUlPaginacao + ' span:contains("Anterior")').attr('class', 'btnAnterior paginacao cinza');
        $('#' + _idUlPaginacao + ' span:contains("Primeira")').attr('class', 'paginacao cinza');
    }

    qtdTotalItens = $('#' + _idGridPaginar + ' tr').length;
    var _qtdPagina = (qtdTotalItens / qtdItemPagina);
    var resto = _qtdPagina % 2;
    var arredondado = Math.round(_qtdPagina);

    if (_qtdPagina > arredondado) {
        _qtdPagina = arredondado + 1;
    }
    else {
        _qtdPagina = arredondado;
    }
    if (_qtdPagina == _index) {
        $('#' + _idUlPaginacao + ' span:contains("Proxima")').attr('class', 'btnAnterior paginacao cinza');
        $('#' + _idUlPaginacao + ' span:contains("Ultima")').attr('class', 'paginacao cinza');
    }
    else {
        $('#' + _idUlPaginacao + ' span:contains("Proxima")').attr('class', 'btnAnterior paginacao verde');
        $('#' + _idUlPaginacao + ' span:contains("Ultima")').attr('class', 'paginacao verde');
    }
}

