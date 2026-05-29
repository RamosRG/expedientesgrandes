
if (contratoApertura.length > 0) {

    // =========================
    // PRIMER PROVEEDOR (GANADOR)
    // =========================

    const ganador = contratoApertura[0];

    const nombre_completo =
        (ganador.nombre ?? '') + ' ' +
        (ganador.apellido_paterno ?? '') + ' ' +
        (ganador.apellido_materno ?? '');

    document.getElementById("nombre_estudio").innerText =
        ganador.nombre_estudio ?? '';

    document.getElementById("no_licitacion").innerText =
        ganador.no_licitacion ?? '';

    document.getElementById("nombre_empresa").innerText =
        ganador.nombre_empresa ?? '';

    document.getElementById("representante_legal").innerText =
        ganador.representante_legal ?? '';

    document.getElementById("registro_publico").innerText =
        ganador.registro_publico ?? '';

    document.getElementById("nombre_usuario").innerText =
        nombre_completo;

    // =========================
    // DATOS PERSONA MORAL
    // =========================

    const datosPersonaMoral = [
        ganador.razon_social,
        ganador.rfc_moral,
        ganador.representante_legal,
        ganador.giro_economico,
        ganador.registro_publico
    ]
    .filter(valor => valor && valor.trim() !== '')
    .join(' ');

    document.getElementById("datos_persona_moral").innerText =
        datosPersonaMoral;

    document.getElementById("notario").innerText =
        ganador.notario ?? '';

    document.getElementById("titular").innerText =
        ganador.titular ?? '';

    // =========================
    // DATOS REPRESENTANTE
    // =========================

// =========================
// DATOS REPRESENTANTE
// =========================

function numeroALetras(numero) {

    numero = parseInt(numero);

    const unidades = [
        '', 'UNO', 'DOS', 'TRES', 'CUATRO',
        'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'
    ];

    const especiales = [
        'DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE',
        'QUINCE', 'DIECISÉIS', 'DIECISIETE',
        'DIECIOCHO', 'DIECINUEVE'
    ];

    const decenas = [
        '', '', 'VEINTE', 'TREINTA', 'CUARENTA',
        'CINCUENTA', 'SESENTA', 'SETENTA',
        'OCHENTA', 'NOVENTA'
    ];

    const centenas = [
        '', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS',
        'CUATROCIENTOS', 'QUINIENTOS',
        'SEISCIENTOS', 'SETECIENTOS',
        'OCHOCIENTOS', 'NOVECIENTOS'
    ];

    if (isNaN(numero) || numero === 0) {
        return '';
    }

    if (numero === 100) {
        return 'CIEN';
    }

    if (numero < 10) {
        return unidades[numero];
    }

    if (numero >= 10 && numero < 20) {
        return especiales[numero - 10];
    }

    if (numero >= 20 && numero < 30) {

        if (numero === 20) {
            return 'VEINTE';
        }

        return 'VEINTI' + unidades[numero - 20].toLowerCase();
    }

    if (numero < 100) {

        const unidad = numero % 10;
        const decena = Math.floor(numero / 10);

        if (unidad === 0) {
            return decenas[decena];
        }

        return decenas[decena] + ' Y ' + unidades[unidad];
    }

    if (numero < 1000) {

        const centena = Math.floor(numero / 100);
        const resto = numero % 100;

        return centenas[centena] + ' ' + numeroALetras(resto);
    }

    if (numero < 1000000) {

        const miles = Math.floor(numero / 1000);
        const resto = numero % 1000;

        let textoMiles = '';

        if (miles === 1) {
            textoMiles = 'MIL';
        } else {
            textoMiles = numeroALetras(miles) + ' MIL';
        }

        return textoMiles + ' ' + numeroALetras(resto);
    }

    return numero.toString();
}


// =========================
// CONVERTIR A TEXTO
// =========================

const instrumentoTexto =
    numeroALetras(ganador.instrumento_re);

const volumenTexto =
    numeroALetras(ganador.volumen_re);

const folioTexto =
    numeroALetras(ganador.folio_re);


// =========================
// CONCATENAR DATOS
// =========================

const datosRepresentante = [
    instrumentoTexto,
    volumenTexto,
    folioTexto
]
.filter(valor => valor && valor.trim() !== '')
.join(' ');


// =========================
// instrumento_re
// =========================

const instrumentoRe =
    document.getElementById("instrumento_re");

if (instrumentoRe) {

    instrumentoRe.innerText =
        instrumentoTexto;
}


// =========================
// volumen_re
// =========================

const volumenRe =
    document.getElementById("volumen_re");

if (volumenRe) {

    volumenRe.innerText =
        volumenTexto;
}


// =========================
// folio_re
// =========================

const folioRe =
    document.getElementById("folio_re");

if (folioRe) {

    folioRe.innerText =
        folioTexto;
}


// =========================
// datosRepresentante
// =========================

const datosRepresentanteElement =
    document.getElementById("datosRepresentante");

if (datosRepresentanteElement) {

    datosRepresentanteElement.innerText =
        datosRepresentante;
}

    // =========================
    // SEGUNDO PROVEEDOR
    // =========================

    if (contratoApertura.length > 1) {

        const otroProveedor = contratoApertura[1];

        const nombre_completo1 =
            (otroProveedor.nombre ?? '') + ' ' +
            (otroProveedor.apellido_paterno ?? '') + ' ' +
            (otroProveedor.apellido_materno ?? '');

        document.getElementById("nombre_empresa1").innerText =
            otroProveedor.nombre_empresa ?? '';

        document.getElementById("estudio_mercado1").innerText =
            otroProveedor.nombre_estudio ?? '';

        document.getElementById("no_licitacion1").innerText =
            otroProveedor.no_licitacion ?? '';

            const ganador = contratoApertura[0];
                    
            

    }

}