<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

use App\Models\CostosTotalesModel;
use App\Models\DescripcionEstudioMercado;
use App\Models\EstudioMercadoModel;
use App\Models\EmpresaModel;
use App\Models\ProcesoModel;
use App\Models\DocumentosProcesosModel;
use App\Models\DetalleProveedorProductolModel;
use App\Models\ContratoAperturaModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class PortalProcesosController extends BaseController
{

  public function documentosProcedimiento()
{
    $idEstudio = $this->request->getPost('id_estudio');

    $vista = (int)$this->request->getPost('vista');

    $empresaModel = new EmpresaModel();

    //llamaras al modelo de EstudioMercadoModel();
     $contratoAperturaModel = new ContratoAperturaModel();

    $empresas = $empresaModel->getEmpresasByEstudio($idEstudio);
    //Mandaras a llamar la funcion del EstudioMercadoModel() donde se llamara $contratoApertura
    $contratoApertura = $contratoAperturaModel->getContratoAperturaById($idEstudio);
    //var_dump($contratoApertura);

    $data = [
        'id_estudio' => $idEstudio,
        'empresas'   => $empresas,

        //finalizas pasando la variable antes llamada $contratoApertura;
        'contratoApertura' => $contratoApertura,
    ];

    switch ($vista) {

        case 1:
            return view("portalProcesos/actaApertura", $data);

        case 2:
            return view("portalProcesos/contratoApertura", $data);

        case 3:
            return view("portalProcesos/falloProcedimiento", $data);

        default:
            return redirect()->back()->with(
                'error',
                'Vista no válida'
            );
    }
}
    private const VINO_OSC = 'FF4A0B1C';
    private const VINO_MED = 'FF8B1A3A';
    private const VINO_PAL = 'FFF3E8EC';
    private const AMARILLO = 'FFFFFF00';
    private const GRIS     = 'FFD9D9D9';
    private const BLANCO   = 'FFFFFFFF';
    private const ROSA_PAL = 'FFFDF5F7';
    public function exportarEstudioMercado(int $id)
    {
        $model = new EstudioMercadoModel();
        $datos = $model->getEstudioById($id);

        if (empty($datos)) {
            return redirect()->back()->with('error', 'Sin datos para exportar.');
        }

        $primer      = $datos[0];
        $proveedores = [];

        foreach ($datos as $d) {
            $uid = $d['id_usuario'];
            if ($uid && !isset($proveedores[$uid])) {
                $proveedores[$uid] = strtoupper(trim(
                    $d['nombre'] . ' ' . $d['apellido_paterno'] . ' ' . $d['apellidoM']
                ));
            }
        }

        $provIds = array_keys($proveedores);
        $nProv   = count($provIds);

        $productos = [];
        foreach ($datos as $d) {
            $idd = $d['id_descripcion'];
            if (!isset($productos[$idd])) {
                $productos[$idd] = [
                    'partida'     => $d['partida'],
                    'descripcion' => $d['producto_servicio'],
                    'unidad'      => $d['unidad_medida'],
                    'cantidad'    => (float) $d['cantidad'],
                    'proveedores' => [],
                ];
            }
            $uid = $d['id_usuario'];
            if ($uid) {
                $productos[$idd]['proveedores'][$uid] = [
                    'precio' => (float) ($d['precio_unitario'] ?? 0),
                    'total'  => (float) ($d['precio_total']   ?? 0),
                    'marca'  => $d['marca_modelo'] ?? '—',
                ];
            }
        }

        $colProvStart = 5;
        $colTotal     = $colProvStart + $nProv * 3;
        $colRef1      = $colTotal + 1;
        $colRef2      = $colTotal + 2;
        $colRef3      = $colTotal + 3;
        $lastCol      = $colRef3;

        $spreadsheet = new Spreadsheet();
        $ws          = $spreadsheet->getActiveSheet();
        $ws->setTitle('Estudio de Mercado');

        $ws->getColumnDimension('A')->setWidth(9);
        $ws->getColumnDimension('B')->setWidth(35);
        $ws->getColumnDimension('C')->setWidth(12);
        $ws->getColumnDimension('D')->setWidth(9);

        for ($i = 0; $i < $nProv; $i++) {
            $b = $colProvStart + $i * 3;
            $ws->getColumnDimension(Coordinate::stringFromColumnIndex($b))->setWidth(13);
            $ws->getColumnDimension(Coordinate::stringFromColumnIndex($b + 1))->setWidth(14);
            $ws->getColumnDimension(Coordinate::stringFromColumnIndex($b + 2))->setWidth(18);
        }
        $ws->getColumnDimension(Coordinate::stringFromColumnIndex($colTotal))->setWidth(14);
        $ws->getColumnDimension(Coordinate::stringFromColumnIndex($colRef1))->setWidth(13);
        $ws->getColumnDimension(Coordinate::stringFromColumnIndex($colRef2))->setWidth(13);
        $ws->getColumnDimension(Coordinate::stringFromColumnIndex($colRef3))->setWidth(13);

        // ── FILA 1 ÁREA ──────────────────────────────────────────────
        $ws->getRowDimension(1)->setRowHeight(20);
        $ws->mergeCells($this->rango(1, 1, 1, $lastCol));
        $this->celda(
            $ws,
            'A1',
            'ÁREA USUARIA / SOLICITANTE: ' . $primer['area'],
            self::AMARILLO,
            '000000',
            true,
            10,
            'left'
        );

        // ── FILA 2 FECHA ─────────────────────────────────────────────
        $ws->getRowDimension(2)->setRowHeight(18);
        $ws->mergeCells($this->rango(2, 1, 2, $lastCol));
        $this->celda(
            $ws,
            'A2',
            'FECHA: ' . $this->formatFecha($primer['created_at']),
            self::AMARILLO,
            '000000',
            true,
            10,
            'left'
        );

        $ws->getRowDimension(3)->setRowHeight(8);

        // ── FILA 4 PARTIDA PRESUPUESTAL ──────────────────────────────
        $ws->getRowDimension(4)->setRowHeight(22);
        $ws->mergeCells($this->rango(4, 1, 4, 4));
        $this->celda($ws, 'A4', 'PARTIDA PRESUPUESTAL', self::GRIS, '000000', true, 10);
        $ws->mergeCells($this->rango(4, 5, 4, $lastCol));
        $this->celda($ws, $this->coord(4, 5), $primer['nombre_estudio'], self::GRIS, '000000', true, 10);

        // ── FILA 5 ENCABEZADO PROVEEDORES ────────────────────────────
        $ws->getRowDimension(5)->setRowHeight(22);

        foreach ([1 => 'PARTIDA', 2 => 'DESCRIPCIÓN', 3 => 'UNIDAD DE MEDIDA', 4 => 'CANTIDAD'] as $c => $txt) {
            $ws->mergeCells($this->rango(5, $c, 6, $c));
            $this->celda($ws, $this->coord(5, $c), $txt, self::VINO_MED, 'FFFFFF', true, 9);
        }

        foreach (array_values($provIds) as $i => $uid) {
            $b = $colProvStart + $i * 3;
            $ws->mergeCells($this->rango(5, $b, 5, $b + 2));
            $this->celda($ws, $this->coord(5, $b), $proveedores[$uid], self::VINO_MED, 'FFFFFF', true, 9);
        }

        $ws->mergeCells($this->rango(5, $colTotal, 6, $colTotal));
        $this->celda($ws, $this->coord(5, $colTotal), 'TOTAL', self::VINO_MED, 'FFFFFF', true, 9);

        $ws->mergeCells($this->rango(5, $colRef1, 5, $colRef3));
        $this->celda($ws, $this->coord(5, $colRef1), 'PRECIO DE REFERENCIA', self::VINO_MED, 'FFFFFF', true, 9);

        // ── FILA 6 SUB-ENCABEZADO ─────────────────────────────────────
        $ws->getRowDimension(6)->setRowHeight(30);

        foreach (array_values($provIds) as $i => $uid) {
            $b = $colProvStart + $i * 3;
            $ws->mergeCells($this->rango(6, $b, 6, $b + 1));
            $this->celda($ws, $this->coord(6, $b),     'PRECIOS',          self::VINO_OSC, 'FFFFFF', true, 9);
            $this->celda($ws, $this->coord(6, $b + 2), 'MARCA Y/O MODELO', self::VINO_OSC, 'FFFFFF', true, 8);
        }

        foreach ([$colRef1 => 'PARTIDAS 1, 2 Y 3', $colRef2 => 'PARTIDAS 4', $colRef3 => 'PARTIDA 5 Y 6'] as $c => $txt) {
            $this->celda($ws, $this->coord(6, $c), $txt, self::GRIS, '000000', true, 8);
        }

        // ── FILA 7 UNITARIO / TOTAL ───────────────────────────────────
        $ws->getRowDimension(7)->setRowHeight(28);

        foreach (array_values($provIds) as $i => $uid) {
            $b = $colProvStart + $i * 3;
            $this->celda($ws, $this->coord(7, $b),     'UNITARIO', self::VINO_OSC, 'FFFFFF', true, 8);
            $this->celda($ws, $this->coord(7, $b + 1), 'TOTAL',    self::VINO_OSC, 'FFFFFF', true, 8);
            $this->celda($ws, $this->coord(7, $b + 2), '',         self::VINO_OSC, 'FFFFFF', true, 8);
        }
        foreach ([$colTotal, $colRef1, $colRef2, $colRef3] as $c) {
            $this->soloBorde($ws, $this->coord(7, $c));
        }

        // ── FILAS DE DATOS ────────────────────────────────────────────
        $filaInicio = 8;
        $fila       = $filaInicio;

        foreach ($productos as $prod) {
            $ws->getRowDimension($fila)->setRowHeight(18);

            $this->celda($ws, "A{$fila}", $prod['partida'],     self::BLANCO, '000000', false, 9, 'center');
            $this->celda($ws, "B{$fila}", $prod['descripcion'], self::BLANCO, '000000', false, 9, 'left');
            $this->celda($ws, "C{$fila}", $prod['unidad'],      self::BLANCO, '000000', false, 9, 'center');
            $this->celda($ws, "D{$fila}", $prod['cantidad'],    self::BLANCO, '000000', false, 9, 'center');

            $totalRefsEnFila = [];

            foreach (array_values($provIds) as $i => $uid) {
                $b    = $colProvStart + $i * 3;
                $ltrU = Coordinate::stringFromColumnIndex($b);
                $ltrT = Coordinate::stringFromColumnIndex($b + 1);
                $cU   = "{$ltrU}{$fila}";
                $cT   = "{$ltrT}{$fila}";
                $cM   = Coordinate::stringFromColumnIndex($b + 2) . $fila;

                $pdata = $prod['proveedores'][$uid] ?? null;

                if ($pdata) {
                    $this->celda($ws, $cU, $pdata['precio'],        self::BLANCO, '000000', false, 9, 'center', '$#,##0.00');
                    $this->celda($ws, $cT, "={$ltrU}{$fila}*D{$fila}", self::BLANCO, '000000', false, 9, 'center', '$#,##0.00');
                    $this->celda($ws, $cM, $pdata['marca'],         self::BLANCO, '000000', false, 9, 'center');
                    $totalRefsEnFila[] = $cT;
                } else {
                    $this->celda($ws, $cU, '—', self::BLANCO, '000000', false, 9, 'center');
                    $this->celda($ws, $cT, '—', self::BLANCO, '000000', false, 9, 'center');
                    $this->celda($ws, $cM, '—', self::BLANCO, '000000', false, 9, 'center');
                }
            }

            $refs = implode(',', $totalRefsEnFila);
            $this->celda(
                $ws,
                $this->coord($fila, $colTotal),
                $refs ? "=IFERROR(AVERAGE({$refs}),0)" : 0,
                self::BLANCO,
                '000000',
                true,
                9,
                'center',
                '$#,##0.00'
            );

            foreach ([$colRef1, $colRef2, $colRef3] as $c) {
                $this->soloBorde($ws, $this->coord($fila, $c));
            }

            $fila++;
        }

        $filaFin = $fila - 1;

        // ── SUBTOTAL ──────────────────────────────────────────────────
        $ws->getRowDimension($fila)->setRowHeight(18);
        $ws->mergeCells($this->rango($fila, 1, $fila, 4));
        $this->celda($ws, "A{$fila}", 'SUBTOTAL', self::VINO_MED, 'FFFFFF', true, 10);

        $subtotalCells = [];
        $subRefs       = [];

        foreach (array_values($provIds) as $i => $uid) {
            $b    = $colProvStart + $i * 3;
            $ltrT = Coordinate::stringFromColumnIndex($b + 1);
            $this->celda($ws, $this->coord($fila, $b),     '', self::VINO_PAL, '000000', false, 9);
            $this->celda(
                $ws,
                $this->coord($fila, $b + 1),
                "=SUM({$ltrT}{$filaInicio}:{$ltrT}{$filaFin})",
                self::VINO_PAL,
                '000000',
                true,
                9,
                'center',
                '$#,##0.00'
            );
            $this->celda($ws, $this->coord($fila, $b + 2), '', self::VINO_PAL, '000000', false, 9);
            $subtotalCells[$uid] = "{$ltrT}{$fila}";
            $subRefs[]           = "{$ltrT}{$fila}";
        }

        $this->celda(
            $ws,
            $this->coord($fila, $colTotal),
            '=IFERROR(AVERAGE(' . implode(',', $subRefs) . '),0)',
            self::VINO_PAL,
            '000000',
            true,
            9,
            'center',
            '$#,##0.00'
        );
        foreach ([$colRef1, $colRef2, $colRef3] as $c) {
            $this->soloBorde($ws, $this->coord($fila, $c));
        }
        $fila++;

        // ── IVA ───────────────────────────────────────────────────────
        $ws->getRowDimension($fila)->setRowHeight(18);
        $ws->mergeCells($this->rango($fila, 1, $fila, 4));
        $this->celda($ws, "A{$fila}", 'IVA (16%)', self::VINO_MED, 'FFFFFF', true, 10);

        $ivaRefs = [];

        foreach (array_values($provIds) as $i => $uid) {
            $b    = $colProvStart + $i * 3;
            $ltrT = Coordinate::stringFromColumnIndex($b + 1);
            $this->celda($ws, $this->coord($fila, $b),     '', self::ROSA_PAL, '000000', false, 9);
            $this->celda(
                $ws,
                $this->coord($fila, $b + 1),
                "={$subtotalCells[$uid]}*0.16",
                self::ROSA_PAL,
                '000000',
                true,
                9,
                'center',
                '$#,##0.00'
            );
            $this->celda($ws, $this->coord($fila, $b + 2), '', self::ROSA_PAL, '000000', false, 9);
            $ivaRefs[] = "{$ltrT}{$fila}";
        }

        $this->celda(
            $ws,
            $this->coord($fila, $colTotal),
            '=IFERROR(AVERAGE(' . implode(',', $ivaRefs) . '),0)',
            self::ROSA_PAL,
            '000000',
            true,
            9,
            'center',
            '$#,##0.00'
        );
        foreach ([$colRef1, $colRef2, $colRef3] as $c) {
            $this->soloBorde($ws, $this->coord($fila, $c));
        }
        $fila++;

        // ── TOTAL ─────────────────────────────────────────────────────
        $ws->getRowDimension($fila)->setRowHeight(22);
        $ws->mergeCells($this->rango($fila, 1, $fila, 4));
        $this->celda($ws, "A{$fila}", 'TOTAL', self::VINO_OSC, 'FFFFFF', true, 11);

        $totRefs = [];

        foreach (array_values($provIds) as $i => $uid) {
            $b    = $colProvStart + $i * 3;
            $ltrT = Coordinate::stringFromColumnIndex($b + 1);
            $this->celda($ws, $this->coord($fila, $b),     '', self::VINO_OSC, 'FFFFFF', true, 9);
            $this->celda(
                $ws,
                $this->coord($fila, $b + 1),
                "={$subtotalCells[$uid]}*1.16",
                self::VINO_OSC,
                'FFFFFF',
                true,
                9,
                'center',
                '$#,##0.00'
            );
            $this->celda($ws, $this->coord($fila, $b + 2), '', self::VINO_OSC, 'FFFFFF', true, 9);
            $totRefs[] = "{$ltrT}{$fila}";
        }

        $this->celda(
            $ws,
            $this->coord($fila, $colTotal),
            '=IFERROR(AVERAGE(' . implode(',', $totRefs) . '),0)',
            self::VINO_OSC,
            'FFFFFF',
            true,
            9,
            'center',
            '$#,##0.00'
        );

        foreach ([$colRef1, $colRef2, $colRef3] as $c) {
            $coord = $this->coord($fila, $c);
            $ws->getStyle($coord)->getFill()->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setARGB(self::VINO_OSC);
            $this->soloBorde($ws, $coord);
        }

        // ── Congelar paneles y descargar ──────────────────────────────
        $ws->freezePane('E8');

        $writer   = new Xlsx($spreadsheet);
        $filename = 'EstudioMercado_' . $id . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
 
    // ── Helpers ───────────────────────────────────────────────────────────

    /** "B5" desde fila y columna (1-based) */
    private function coord(int $fila, int $col): string
    {
        return Coordinate::stringFromColumnIndex($col) . $fila;
    }

    /** "A1:C3" desde fila/col inicio y fin (1-based) */
    private function rango(int $r1, int $c1, int $r2, int $c2): string
    {
        return Coordinate::stringFromColumnIndex($c1) . $r1
            . ':'
            . Coordinate::stringFromColumnIndex($c2) . $r2;
    }

    /**
     * Escribe valor y aplica estilos. Usa solo getCell() y getStyle()
     * con coordenada string: compatible con PhpSpreadsheet v1 y v2.
     */
    private function celda(
        $ws,
        string $coord,
        $valor,
        string $bgARGB   = 'FFFFFFFF',
        string $fontColor = '000000',
        bool   $bold      = false,
        int    $fontSize  = 9,
        string $halign    = 'center',
        string $numFmt    = ''
    ): void {
        $ws->getCell($coord)->setValue($valor);

        $style = $ws->getStyle($coord);

        $style->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB($bgARGB);

        $style->getFont()
            ->setBold($bold)
            ->setSize($fontSize)
            ->setName('Arial')
            ->getColor()->setARGB('FF' . ltrim($fontColor, '#'));

        $style->getAlignment()
            ->setHorizontal(
                $halign === 'left'
                    ? Alignment::HORIZONTAL_LEFT
                    : Alignment::HORIZONTAL_CENTER
            )
            ->setVertical(Alignment::VERTICAL_CENTER)
            ->setWrapText(true);

        $style->getBorders()->applyFromArray([
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color'       => ['argb' => 'FF000000'],
            ],
        ]);

        if ($numFmt !== '') {
            $style->getNumberFormat()->setFormatCode($numFmt);
        }
    }

    /** Solo aplica borde sin tocar fill/font */
    private function soloBorde($ws, string $coord): void
    {
        $ws->getStyle($coord)->getBorders()->applyFromArray([
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color'       => ['argb' => 'FF000000'],
            ],
        ]);
    }
 


    // ══════════════════════════════════════════════════════════════════
    // Helpers privados
    // ══════════════════════════════════════════════════════════════════

    /**
     * Escribe un valor en una celda y aplica estilos.
     */
    private function writeCell(
        $sheet,
        int    $row,
        int    $col,
        $value,
        string $bgARGB    = 'FFFFFFFF',
        string $fontColor = '000000',
        bool   $bold      = false,
        int    $fontSize  = 9,
        string $halign    = 'center',
        string $numFmt    = ''
    ): void {
        $cell = $sheet->getCellByColumnAndRow($col, $row);
        $cell->setValue($value);

        $style = $sheet->getStyleByColumnAndRow($col, $row);

        $style->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB($bgARGB);

        $style->getFont()
            ->setBold($bold)
            ->setSize($fontSize)
            ->setName('Arial')
            ->getColor()->setARGB('FF' . ltrim($fontColor, '#'));

        $style->getAlignment()
            ->setHorizontal($halign === 'left'
                ? Alignment::HORIZONTAL_LEFT
                : Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER)
            ->setWrapText(true);

        $thin = [
            'borderStyle' => Border::BORDER_THIN,
            'color'       => ['argb' => 'FF000000'],
        ];
        $style->getBorders()->applyFromArray([
            'allBorders' => $thin,
        ]);

        if ($numFmt) {
            $style->getNumberFormat()->setFormatCode($numFmt);
        }
    }

    /** Aplica solo borde a una celda (sin cambiar fill/font). */
    private function applyBorder($sheet, int $row, int $col): void
    {
        $sheet->getStyleByColumnAndRow($col, $row)
            ->getBorders()
            ->applyFromArray([
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'       => ['argb' => 'FF000000'],
                ],
            ]);
    }

    /** Merge usando índices de columna (1-based). */
    private function mergeCellsByCol($sheet, int $r1, int $c1, int $r2, int $c2): void
    {
        $a1 = Coordinate::stringFromColumnIndex($c1) . $r1;
        $a2 = Coordinate::stringFromColumnIndex($c2) . $r2;
        $sheet->mergeCells("{$a1}:{$a2}");
    }

    /** Formatea fecha de BD a dd/mm/yyyy. */
    private function formatFecha(string $fecha): string
    {
        try {
            $dt = new \DateTime($fecha);
            return $dt->format('d/m/Y');
        } catch (\Exception $e) {
            return $fecha;
        }
    }

    public function guardarProceso()
    {
        try {
            $db = \Config\Database::connect();
            $data = $this->request->getJSON(true);
            var_dump($data);
            exit();
            if (!$data) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'msg' => 'No se recibieron datos'
                ]);
            }

            // VALIDACIONES BÁSICAS
            if (empty($data['id_area']) || empty($data['catalogo']) || empty($data['nomb_procedimiento'])) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'msg' => 'Faltan datos obligatorios'
                ]);
            }

            // INICIAR TRANSACCIÓN
            $db->transBegin();

            // 1. GUARDAR PROCESO (SOLO UNA VEZ)
            $proceso = [
                'nombre_estudio' => $data['nomb_procedimiento'],
                'fk_area' => $data['id_area'],
                'created_at' => date('Y-m-d H:i:s')
            ];

            $db->table('estudio_mercado')->insert($proceso);
            $id_proceso = $db->insertID();

            if (!$id_proceso) {
                throw new \Exception('No se pudo crear el proceso');
            }

            // 2. GUARDAR PUNTOS
            if (!empty($data['puntos'])) {
                foreach ($data['puntos'] as $punto) {
                    if (trim($punto) !== '') {
                        $db->table('puntos')->insert([
                            'id_proceso' => $id_proceso,
                            'descripcion' => $punto
                        ]);
                    }
                }
            }

            // 3. PRODUCTOS
            if (!empty($data['productos'])) {
                foreach ($data['productos'] as $producto) {
                    if (empty($producto['id_producto']))
                        continue;

                    $db->table('proceso_productos')->insert([
                        'id_proceso' => $id_proceso,
                        'id_producto' => $producto['id_producto'],
                        'cantidad' => $producto['cantidad'] ?? 0
                    ]);

                    // 4. PRECIOS POR PROVEEDOR
                    if (!empty($producto['precios'])) {
                        foreach ($producto['precios'] as $precio) {
                            if (empty($precio['precio']))
                                continue;

                            $db->table('proceso_precios')->insert([
                                'id_proceso' => $id_proceso,
                                'id_producto' => $producto['id_producto'],
                                'id_proveedor' => $precio['proveedor'],
                                'precio' => $precio['precio']
                            ]);
                        }
                    }
                }
            }

            // FINALIZAR TRANSACCIÓN
            if ($db->transStatus() === false) {
                $db->transRollback();
                return $this->response->setJSON([
                    'status' => 'error',
                    'msg' => 'Error en la transacción'
                ]);
            }

            $db->transCommit();

            return $this->response->setJSON([
                'status' => 'success',
                'id_proceso' => $id_proceso
            ]);
        } catch (\Throwable $e) {
            if (isset($db)) {
                $db->transRollback();
            }

            return $this->response->setJSON([
                'status' => 'error',
                'msg' => $e->getMessage()
            ]);
        }
    }
    public function verEstudioMercado($idEstudio)
    {
        return view("portalProcesos/verEstudioMercado");
    }

    public function obtenerEstudioMercadoPorId($id)
    {
        try {

            $model = new EstudioMercadoModel();
            $data = $model->getEstudioById($id);

            return $this->response->setJSON([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {

            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function obtenerEstudiosFinalizados()
    {
        try {

            $model = new EstudioMercadoModel();
            $data = $model->obtenerEstudiosFinalizados();

            return $this->response->setJSON([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {

            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function guardarEstudioMercado()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);
        $db = \Config\Database::connect();

        if (!$data) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No llegaron datos'
            ]);
        }

        // VALIDACIONES
        if (empty($data['productos'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No hay productos'
            ]);
        }

        if (empty($data['proveedores'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No hay proveedores'
            ]);
        }

        // MODELOS
        $estudioMercadoModel = new EstudioMercadoModel();
        $descripcionModel = new DescripcionEstudioMercado();
        $razonSocialModel = new DetalleProveedorProductolModel();
        $costosTotalesModel = new CostosTotalesModel();


        $db->transStart();

        try {

            // =========================
            // ESTUDIO MERCADO
            // =========================

            $estudioMercadoModel->insert([

                'nombre_estudio' => $data['nomb_procedimiento'],

                'fk_area' => $data['id_area']

                // created_at automático
            ]);

            $idEstudio = $estudioMercadoModel->insertID();

            // =========================
            // PRODUCTOS
            // =========================

            foreach ($data['productos'] as $index => $producto) {

                $descripcionModel->insert([

                    'fk_estudio_mercado' => $idEstudio,

                    'partida' => $index + 1,

                    'cantidad' => $producto['cantidad'],

                    'fk_descripcion_catalogo' => $producto['id_producto']
                ]);

                $idDescripcion = $descripcionModel->insertID();

                // =========================
                // PRECIOS POR PROVEEDOR
                // =========================

                foreach ($producto['precios'] as $detalle) {

                    $razonSocialModel->insert([

                        'fk_descripcion_estudio_mercado' => $idDescripcion,

                        'fk_proveedor' => $detalle['proveedor'],

                        'precio_unitario' => $detalle['precio'],

                        'precio_total' => $detalle['total_producto'],

                        'marca_modelo' => $detalle['marca_modelo']
                    ]);
                }
            }

            // =========================
            // TOTALES
            // =========================

            foreach ($data['totales'] as $totalProveedor) {

                $subtotal = str_replace(['$', ','], '', $totalProveedor['subtotal']);

                $iva = str_replace(['$', ','], '', $totalProveedor['iva']);

                $total = str_replace(['$', ','], '', $totalProveedor['total']);

                $costosTotalesModel->insert([

                    'fk_estudio_mercado' => $idEstudio,

                    'fk_proveedor' => $totalProveedor['proveedor'],

                    'subtotal' => $subtotal,

                    'iva' => $iva,

                    'total' => $total
                ]);
            }

            // FINALIZAR TRANSACCIÓN
            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Error al guardar');
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Estudio guardado correctamente'
            ]);
        } catch (\Exception $e) {

            $db->transRollback();

            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function descargarDocumento($id_documento)
    {
        $model = new DocumentosProcesosModel();
        $documento = $model->find($id_documento);

        // ✅ Validar si existe el documento en BD
        if (!$documento) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Documento no encontrado'
            ]);
        }

        // ✅ Usar $documento, no $id_documento
        $rutaArchivo = ROOTPATH . ltrim($documento['ruta_documento'], '/');

        if (!file_exists($rutaArchivo)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Archivo no encontrado',
                'ruta' => $rutaArchivo
            ]);
        }

        $extension = pathinfo($rutaArchivo, PATHINFO_EXTENSION);

        return $this->response->download($rutaArchivo, null)
            ->setFileName($documento['nombre_proceso'] . '.' . $extension);
    }

    public function verDocumento($id_documento)
    {
        $model = new DocumentosProcesosModel();
        $documento = $model->find($id_documento);

        if (!$documento) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Documento no encontrado'
            ]);
        }

        $rutaArchivo = ROOTPATH . ltrim($documento['ruta_documento'], '/');

        if (!file_exists($rutaArchivo)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Archivo no encontrado'
            ]);
        }

        // Obtener extensión
        $extension = pathinfo($rutaArchivo, PATHINFO_EXTENSION);

        // Detectar tipo MIME
        $mime = mime_content_type($rutaArchivo);

        // 🔥 MOSTRAR EN EL NAVEGADOR (NO DESCARGAR)
        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Content-Disposition', 'inline; filename="' . $documento['nombre_proceso'] . '.' . $extension . '"')
            ->setBody(file_get_contents($rutaArchivo));
    }

    public function verProcesos($id_proceso)
    {

        $model = new ProcesoModel();
        $proceso = $model->getProcesoPorID($id_proceso);
        //var_dump($proceso);
        return view('procesosInternos/verProcesos', [
            'procesos' => $proceso
        ]);
    }
    public function procesos()
    {
        return view("portalProcesos/portalProcesos");
    }
    public function obtenerProcesos()
    {
        try {
            $model = new ProcesoModel();
            $procesos = $model->orderBy('id_proceso', 'DESC')->findAll();

            return $this->response->setJSON([
                'success' => true,
                'data' => $procesos
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error al obtener procesos: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al cargar los procesos'
            ]);
        }
    }

    public function obtenerProceso($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID no especificado'
                ]);
            }

            $model = new ProcesoModel();
            $proceso = $model->find($id);

            if (!$proceso) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Proceso no encontrado'
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'data' => $proceso
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error al obtener proceso: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al cargar el proceso'
            ]);
        }
    }

    public function guardar()
    {
        try {
            // Verificar si es petición AJAX
            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Petición no válida'
                ]);
            }

            $data = $this->request->getPost();

            // Validar campos requeridos
            if (empty($data['nombre']) || empty($data['clave'])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Nombre y clave son requeridos'
                ]);
            }

            $model = new ProcesoModel();

            // Verificar si ya existe un proceso con el mismo nombre o clave
            $existeNombre = $model->where('nombre', $data['nombre'])->first();
            if ($existeNombre) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ya existe un proceso con este nombre'
                ]);
            }

            $existeClave = $model->where('clave', $data['clave'])->first();
            if ($existeClave) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ya existe un proceso con esta clave'
                ]);
            }

            $proceso = [
                'nombre' => trim($data['nombre']),
                'clave' => trim($data['clave']),
                'descripcion' => $data['descripcion'] ?? null,
                'activo' => isset($data['activo']) ? 1 : 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $id = $model->insert($proceso);

            if ($id) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Proceso guardado exitosamente',
                    'id_proceso' => $id
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar el proceso'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error al guardar proceso: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }

    public function actualizar($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID no especificado'
                ]);
            }

            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Petición no válida'
                ]);
            }

            $data = $this->request->getPost();

            if (empty($data['nombre']) || empty($data['clave'])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Nombre y clave son requeridos'
                ]);
            }

            $model = new ProcesoModel();

            // Verificar si ya existe otro proceso con el mismo nombre
            $existeNombre = $model->where('nombre', $data['nombre'])
                ->where('id_proceso !=', $id)
                ->first();
            if ($existeNombre) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ya existe otro proceso con este nombre'
                ]);
            }

            // Verificar si ya existe otro proceso con la misma clave
            $existeClave = $model->where('clave', $data['clave'])
                ->where('id_proceso !=', $id)
                ->first();
            if ($existeClave) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ya existe otro proceso con esta clave'
                ]);
            }

            $proceso = [
                'nombre' => trim($data['nombre']),
                'clave' => trim($data['clave']),
                'descripcion' => $data['descripcion'] ?? null,
                'activo' => isset($data['activo']) ? 1 : 0,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $result = $model->update($id, $proceso);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Proceso actualizado exitosamente'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al actualizar el proceso'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error al actualizar proceso: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }

    public function eliminar($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID no especificado'
                ]);
            }

            $model = new ProcesoModel();
            $proceso = $model->find($id);

            if (!$proceso) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Proceso no encontrado'
                ]);
            }

            $result = $model->delete($id);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Proceso eliminado exitosamente'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al eliminar el proceso'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error al eliminar proceso: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }

    public function cambiarEstado($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID no especificado'
                ]);
            }

            $data = $this->request->getPost();
            $nuevoEstado = isset($data['activo']) ? (int) $data['activo'] : null;

            if ($nuevoEstado === null || !in_array($nuevoEstado, [0, 1])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Estado no válido'
                ]);
            }

            $model = new ProcesoModel();
            $proceso = $model->find($id);

            if (!$proceso) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Proceso no encontrado'
                ]);
            }

            $result = $model->update($id, [
                'activo' => $nuevoEstado,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => $nuevoEstado == 1 ? 'Proceso activado' : 'Proceso desactivado'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al cambiar el estado'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error al cambiar estado: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }
}
