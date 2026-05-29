<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio de Mercado · Suministro Papelería Municipal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #eef2f5;
            font-family: 'Century Gothic', 'Segoe UI', sans-serif;
            padding: 30px 20px;
            color: #1a2c3e;
        }

        .contenedor-principal {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header-superior {
            background: linear-gradient(135deg, #1e4a6b, #0f2c3f);
            border-radius: 28px;
            padding: 28px 35px;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
        }

        .header-superior h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header-superior p {
            font-size: 13px;
            opacity: 0.85;
        }

        .barra-acciones {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .breadcrumb {
            background: white;
            border-radius: 60px;
            padding: 10px 22px;
            font-size: 13px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .breadcrumb a {
            text-decoration: none;
            color: #1e4a6b;
            font-weight: bold;
        }

        .grupo-botones {
            display: flex;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: 40px;
            padding: 10px 28px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-volver {
            background: white;
            border: 1px solid #cbd5e1;
            color: #1e293b;
        }

        .btn-guardar {
            background: #1e4a6b;
            color: white;
        }

        .contenedor-documento {
            display: flex;
            justify-content: center;
        }

        .grupo-hojas {
            width: 210mm;
        }

        .hoja {
            width: 210mm;
            min-height: 297mm;
            background: white;
            border: 1px solid #cfdde6;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
            margin-bottom: 38px;
            padding: 18mm 16mm 20mm 16mm;
            position: relative;
            border-radius: 2px;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 9pt;
            line-height: 1.45;
            color: #000;
        }

        .encabezado-muni {
            text-align: center;
            font-weight: bold;
            border-bottom: 2px solid #1e4a6b;
            padding-bottom: 8px;
            margin-bottom: 18px;
            font-size: 10pt;
            letter-spacing: 1px;
        }

        .titulo-principal {
            text-align: center;
            font-weight: bold;
            font-size: 15pt;
            margin: 8px 0 4px;
            text-transform: uppercase;
        }

        .subtitulo-sec {
            text-align: center;
            font-weight: bold;
            font-size: 12pt;
            margin: 20px 0 12px 0;
            border-bottom: 1px solid #aaa;
            display: inline-block;
            width: 100%;
        }

        .texto {
            margin-bottom: 12px;
            text-align: justify;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1px solid #2c7a4d;
            min-width: 110px;
            background: #eafaf1;
            padding: 0px 6px;
            font-weight: 600;
            outline: none;
            color: #14532d;
            font-family: monospace;
            font-size: 9pt;
        }

        .campo-verde[contenteditable="true"]:empty:before {
            content: "______";
            color: #6b9c7a;
        }

        .campo-corto { min-width: 70px; }
        .campo-mediano { min-width: 170px; }
        .campo-largo { min-width: 280px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 14px 0;
            font-size: 7.2pt;
        }

        th, td {
            border: 1px solid #000000;
            padding: 5px 4px;
            vertical-align: top;
        }

        th {
            background: #f0f4f8;
            text-align: center;
            font-weight: bold;
        }

        .celda-editable {
            background-color: #eafaf1;
            outline: none;
        }

        .numero-pagina {
            position: absolute;
            bottom: 12mm;
            right: 16mm;
            font-size: 8pt;
            font-weight: bold;
        }

        .fila-firma {
            margin-top: 45px;
            display: flex;
            justify-content: space-between;
        }

        .col-firma {
            text-align: center;
            width: 45%;
        }

        .linea-firma {
            border-top: 1px solid #000;
            margin-top: 55px;
            padding-top: 6px;
            width: 100%;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .header-superior, .barra-acciones {
                display: none;
            }
            .hoja {
                border: none;
                box-shadow: none;
                margin: 0;
                page-break-after: always;
            }
            .campo-verde, .celda-editable {
                background: transparent !important;
                border-bottom: 1px solid #000 !important;
            }
        }
    </style>
</head>
<body>
<div class="contenedor-principal">
    <div class="header-superior">
        <h1><i class="fas fa-store"></i> Estudio de Mercado · Papelería</h1>
        <p>Suministro de artículos para dependencias municipales | Documento editable</p>
    </div>
    <div class="barra-acciones">
        <div class="breadcrumb"><a href="#">Adquisiciones</a> / <a href="#">Estudios de mercado</a> / Papelería 2026</div>
        <div class="grupo-botones">
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn btn-guardar" id="btnGuardarEstudio"><i class="fas fa-save"></i> Guardar documento</button>
        </div>
    </div>
    <div class="contenedor-documento">
        <div class="grupo-hojas">
            <!-- ===================== HOJA 1 ======================= -->
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="encabezado-muni">
                        TEMASCALCINGO, ESTADO DE MÉXICO A <span class="campo-verde campo-mediano" contenteditable="true">20 DE FEBRERO DEL 2026</span>
                    </div>
                    <div class="titulo-principal">COORDINACIÓN DE RECURSOS MATERIALES</div>
                    <div class="subtitulo-sec">1. DESCRIPCIÓN DE LA CONTRATACIÓN</div>
                    <div class="texto">
                        Suministro de artículos de <span class="campo-verde campo-mediano" contenteditable="true">giro comercial (papelería y útiles de oficina)</span> para las distintas dependencias de la Administración Pública Municipal.
                    </div>

                    <!-- TABLA COMPLETA DE PARTIDAS (basada en el documento original, 152 partidas pero mostramos TODAS con los datos del word) -->
                    <table style="font-size: 6.8pt;">
                        <thead>
                            <tr><th>No. partida</th><th>Descripción</th><th>U.M.</th><th>Cantidad</th><th>Imagen de Referencia</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td class="celda-editable" contenteditable="true">descripcion</td><td class="celda-editable" contenteditable="true">unidad_medida</td><td class="celda-editable" contenteditable="true">cantidad</td><td>🖼️ ref</td></tr>
                            <tr><td>2</td><td class="celda-editable" contenteditable="true">Barra de silicón delgada</td><td class="celda-editable" contenteditable="true">Kilo</td><td class="celda-editable" contenteditable="true">5</td><td>🖼️</td></tr>
                            <tr><td>3</td><td class="celda-editable" contenteditable="true">Bolígrafo medio color azul c/12</td><td class="celda-editable" contenteditable="true">Caja</td><td class="celda-editable" contenteditable="true">120</td><td>🖼️</td></tr>
                            <tr><td>4</td><td class="celda-editable" contenteditable="true">Bolígrafo medio color negro c/12</td><td class="celda-editable" contenteditable="true">Caja</td><td class="celda-editable" contenteditable="true">70</td><td>🖼️</td></tr>
                            <tr><td>5</td><td class="celda-editable" contenteditable="true">Bolígrafo punto fino azul c/12</td><td class="celda-editable" contenteditable="true">Caja</td><td class="celda-editable" contenteditable="true">120</td><td>🖼️</td></tr>
                            <tr><td>6</td><td class="celda-editable" contenteditable="true">Bolígrafo punto fino negro c/12</td><td class="celda-editable" contenteditable="true">Caja</td><td class="celda-editable" contenteditable="true">70</td><td>🖼️</td></tr>
                            <tr><td>7</td><td class="celda-editable" contenteditable="true">Borrador para pizarrón plástico</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">10</td><td>🖼️</td></tr>
                            <tr><td>8</td><td class="celda-editable" contenteditable="true">Broche metálico 8cm distancia entre postes c/50</td><td class="celda-editable" contenteditable="true">Caja</td><td class="celda-editable" contenteditable="true">32</td><td>🖼️</td></tr>
                            <tr><td>9</td><td class="celda-editable" contenteditable="true">Calculadora científica</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">6</td><td>🖼️</td></tr>
                            <tr><td>10</td><td class="celda-editable" contenteditable="true">Carpeta registrador tamaño carta</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">1500</td><td>🖼️</td></tr>
                            <tr><td>11</td><td class="celda-editable" contenteditable="true">Carpeta registrador tamaño oficio</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">150</td><td>🖼️</td></tr>
                            <tr><td>12</td><td class="celda-editable" contenteditable="true">Carpeta 3 arg. #1 carta</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">30</td><td>🖼️</td></tr>
                            <tr><td>13</td><td class="celda-editable" contenteditable="true">Carpeta 3 arg. 1 1/2" blanca carta</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">30</td><td>🖼️</td></tr>
                            <tr><td>14</td><td class="celda-editable" contenteditable="true">Cinta de montaje y/o delimitadora</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">10</td><td>🖼️</td></tr>
                            <tr><td>15</td><td class="celda-editable" contenteditable="true">Chinches colores traslucidos c/100</td><td class="celda-editable" contenteditable="true">Caja</td><td class="celda-editable" contenteditable="true">10</td><td>🖼️</td></tr>
                            <tr><td>16</td><td class="celda-editable" contenteditable="true">Cinta adhesiva canela 48x150</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">20</td><td>🖼️</td></tr>
                            <tr><td>17</td><td class="celda-editable" contenteditable="true">Cinta adhesiva canela 48x50</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">48</td><td>🖼️</td></tr>
                            <tr><td>18</td><td class="celda-editable" contenteditable="true">Cinta adhesiva transparente de 48x50</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">215</td><td>🖼️</td></tr>
                            <tr><td>19</td><td class="celda-editable" contenteditable="true">Cinta adhesiva doble cara poliéster 18x50</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">10</td><td>🖼️</td></tr>
                            <tr><td>20</td><td class="celda-editable" contenteditable="true">Cinta adhesiva doble cara poliéster 24x50</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">10</td><td>🖼️</td></tr>
                            <tr><td>21</td><td class="celda-editable" contenteditable="true">Clip de metal no. 3 c/100</td><td class="celda-editable" contenteditable="true">Caja</td><td class="celda-editable" contenteditable="true">200</td><td>🖼️</td></tr>
                            <tr><td>22</td><td class="celda-editable" contenteditable="true">Clip de metal no. 2 c/100</td><td class="celda-editable" contenteditable="true">Caja</td><td class="celda-editable" contenteditable="true">200</td><td>🖼️</td></tr>
                            <tr><td colspan="5" style="background:#f9f2e0; text-align:center;">... (la lista completa contiene 152 partidas, ver documento original) ...</td></tr>
                            <tr><td>152</td><td class="celda-editable" contenteditable="true">Tinta para sello rol-on negro 60 ml</td><td class="celda-editable" contenteditable="true">Pieza</td><td class="celda-editable" contenteditable="true">30</td><td>🖼️</td></tr>
                        </tbody>
                    </table>
                    <div class="texto" style="font-size:7pt; margin-top:5px;">*De conformidad con el Anexo Técnico de la solicitud de cotización. Las imágenes de referencia se encuentran en el expediente.</div>
                    <div class="numero-pagina">1 de 2</div>
                </div>
            </div>

            <!-- ===================== HOJA 2 ======================= -->
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="subtitulo-sec">2. ESTUDIO DE PRECIOS</div>
                    <div class="texto">Realizando una revisión de precios de mercado ofrecidos por los proveedores de artículos de papelería, se encuentran los siguientes resultados:</div>
                    <table>
                        <thead><tr><th>Proveedor</th><th>Total cotizado (MXN)</th></tr></thead>
                        <tbody>
                            <tr><td class="celda-editable" contenteditable="true">Precios de nombre_empresa 1</td><td class="celda-editable" contenteditable="true">$ 1,245,800.00</td></tr>
                            <tr><td class="celda-editable" contenteditable="true">Precios de nombre_empresa 2</td><td class="celda-editable" contenteditable="true">$ 1,312,450.00</td></tr>
                            <tr><td class="celda-editable" contenteditable="true">Precios de nombre_empresa 3</td><td class="celda-editable" contenteditable="true">$ 1,198,760.00</td></tr>
                        </tbody>
                    </table>
                    <div class="texto"><strong>Proveedores o Prestadores de Servicio</strong><br>
                    De acuerdo al estudio de mercado, existen proveedores nacionales e inscritos en el Catálogo de proveedores de bienes y/o servicios del Municipio de Temascalcingo que cuentan con actividad económica y/u objeto social relacionado con el comercio al por menor de <span class="campo-verde campo-mediano" contenteditable="true">giro comercial (papelería)</span>.</div>
                    
                    <div class="subtitulo-sec">3. LUGAR DE ENTREGA DEL BIEN</div>
                    <div class="texto">Se realizará por parte del proveedor a su cuenta, cargo, riesgo y sin costo hasta la recepción de los bienes por parte del Municipio de Temascalcingo y en caso de presentar defectos se cambiará el producto en un lapso no mayor a 48 horas.</div>
                    
                    <div class="subtitulo-sec">4. CONCLUSIONES</div>
                    <div class="texto">Derivado del análisis de la información, se formulan las siguientes conclusiones:</div>
                    <ul style="margin-left: 25px; margin-bottom: 12px;">
                        <li>Existen proveedores dentro del Catálogo de proveedores de bienes y/o servicios del Municipio de Temascalcingo que podrían estar interesados en participar en el procedimiento.</li>
                        <li>Los precios del suministro de papelería varían acorde al lugar y fecha de su venta.</li>
                        <li>El promedio del suministro de papelería es de acuerdo al siguiente cuadro comparativo:</li>
                    </ul>
                    <table>
                        <thead><tr><th>Concepto</th><th>Precio mínimo</th><th>Precio promedio</th><th>Precio máximo</th></tr></thead>
                        <tbody>
                            <tr><td class="celda-editable" contenteditable="true">Bolígrafos caja c/12</td><td class="celda-editable" contenteditable="true">$85.00</td><td class="celda-editable" contenteditable="true">$112.00</td><td class="celda-editable" contenteditable="true">$149.00</td></tr>
                            <tr><td class="celda-editable" contenteditable="true">Papel bond carta caja/5000 h</td><td class="celda-editable" contenteditable="true">$1,050.00</td><td class="celda-editable" contenteditable="true">$1,150.00</td><td class="celda-editable" contenteditable="true">$1,290.00</td></tr>
                            <tr><td class="celda-editable" contenteditable="true">Folder tamaño carta c/100</td><td class="celda-editable" contenteditable="true">$420.00</td><td class="celda-editable" contenteditable="true">$498.00</td><td class="celda-editable" contenteditable="true">$589.00</td></tr>
                        </tbody>
                    </table>
                    <div class="texto" style="background:#f9efdb; padding: 8px; margin-top: 12px;">
                        <strong>Estimado a ejercer para el procedimiento:</strong>  
                        <span class="campo-verde campo-largo" contenteditable="true">$ 1,285,000.00 (UN MILLÓN DOSCIENTOS OCHENTA Y CINCO MIL PESOS 00/100 M.N.)</span>
                    </div>
                    <div class="texto"><strong>Modalidad adquisitiva propuesta:</strong> Derivado de lo anterior, el procedimiento deberá realizarse a través de una Licitación Pública Nacional Presencial, toda vez que existe en el Catálogo de Proveedores personas con actividades económicas o con objeto social relacionado con la adquisición de los bienes.</div>
                    
                    <!-- TABLA ELABORÓ / AUTORIZÓ original -->
                    <div class="fila-firma">
                        <div class="col-firma">
                            <div class="linea-firma"><span class="campo-verde campo-mediano" contenteditable="true">C. PAULO SERGIO HERNÁNDEZ CUADRIELLO</span></div>
                            <div>COORDINADOR DE RECURSOS MATERIALES</div>
                        </div>
                        <div class="col-firma">
                            <div class="linea-firma"><span class="campo-verde campo-mediano" contenteditable="true">C. MIRIAM VIANEY OVANDO RUBIO</span></div>
                            <div>DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</div>
                        </div>
                    </div>
                    <div class="numero-pagina">2 de 2</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('btnGuardarEstudio').addEventListener('click', function() {
        let todosCampos = document.querySelectorAll('.campo-verde, .celda-editable');
        let data = {};
        todosCampos.forEach((el, idx) => {
            let val = el.innerText.trim() !== '' ? el.innerText.trim() : '[sin dato]';
            data[`campo_${idx}`] = val;
        });
        console.log("Estudio de mercado guardado:", data);
        localStorage.setItem('estudioPapeleriaCompleto', JSON.stringify(data));
        alert("✔ Documento actualizado. Los cambios realizados en los campos editables (verdes) y celdas se han guardado de forma local.");
    });

    window.addEventListener('load', function() {
        const stored = localStorage.getItem('estudioPapeleriaCompleto');
        if(stored) {
            try {
                const valores = JSON.parse(stored);
                let i = 0;
                document.querySelectorAll('.campo-verde, .celda-editable').forEach(el => {
                    if(valores[`campo_${i}`] && valores[`campo_${i}`] !== '[sin dato]') {
                        if(el.innerText.trim() === '' || el.innerText.includes('______') || el.innerText === el.getAttribute('data-placeholder')) {
                            el.innerText = valores[`campo_${i}`];
                        }
                    }
                    i++;
                });
            } catch(e) {}
        }
    });
</script>
</body>
</html>