<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Helpers\Helpers;
use Faker\Extension\Helper;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SoapClient;


class UtilesController extends Controller
{
    public function utiles_inicio () {
        return view('utiles.home');
    }

    
    public function utiles_pdf () {

        $mpdf= new \Mpdf\Mpdf();
        $mpdf->WriteHTML( "<h1> Hola Mundo Imprimiendo un Pdf con Laravel </h1>");
        $mpdf->Output(); // Salida directa al navegador

    }
    public function reporte_excel()
    {
        // Crear una nueva hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()
            ->setCreator("Frxng2")
            ->setLastModifiedBy("Frxngb@gmail.com")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setDescription("Excel Creado con Laravel")
            ->setKeywords("Office 2024 openxml php")
            ->setCategory("Test Result File");
    
        // Obtener la hoja activa
        $sheet = $spreadsheet->getActiveSheet();
    
        // Establecer encabezados
        $sheet->setCellValue('A1', 'ID')
              ->setCellValue('B1', 'Nombre')
              ->setCellValue('C1', 'Slug')
              ->setCellValue('D1', 'Descripción')
              ->setCellValue('E1', 'Fecha')
              ->setCellValue('F1', 'Precio')
              ->setCellValue('G1', 'Stock')
              ->setCellValue('H1', 'Categoría ID');
    
        // Obtener datos de la base de datos
        $productos = Productos::all();
        
        // Escribir datos en las filas
        $row = 2; // Empezar desde la segunda fila
        foreach ($productos as $producto) {
            $sheet->setCellValue('A' . $row, $producto->id)
                  ->setCellValue('B' . $row, $producto->nombre)
                  ->setCellValue('C' . $row, $producto->slug)
                  ->setCellValue('D' . $row, $producto->descripcion)
                  ->setCellValue('E' . $row, Helpers::invierteFecha($producto->fecha))
                  ->setCellValue('F' . $row, $producto->precio)
                  ->setCellValue('G' . $row, $producto->stock)
                  ->setCellValue('H' . $row, $producto->categoria->nombre);
            $row++;
        }
    
        // Establecer el nombre de la hoja
        $sheet->setTitle('Productos');
    
        // Establecer el índice de la hoja activa para que Excel la abra por defecto
        $spreadsheet->setActiveSheetIndex(0);
    
        // Crear el escritor de Excel
        $writer = new Xlsx($spreadsheet);
    
        // Enviar encabezados para la descarga del archivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="productos.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
    
        // Guardar el archivo en la salida
        $writer->save('php://output');
        exit;
    }
    
    public function reporte_cliente_rest () {

        $response = Http::get("https://www.amiiboapi.com/api/amiibo/?name=mario");
        $datos = $response->json();
        $json = $response->body();
        $status = $response->status();
        $headers = $response->headers();


        return view('utiles/cliente_rest', compact('response', 'datos', 'json', 'status', 'headers'));
    }
    public function reporte_cliente_soap () {
        $cliente = new SoapClient("https://www.cesarcancino.com/soap/index.php?wsdl");  //Creamos el cliente SOAP
        $datos = $cliente->retornarDatos("Prueba", "fran.valdenegr@gmail.com", "+56298123" );  //Llamamos al servicio
        
        return view('utiles.cliente_soap', compact('cliente', 'datos'));

    }
}
