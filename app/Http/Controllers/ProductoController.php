<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
/*
    Controlador de usuario
*/
    class ProductoController extends Controller {

        // Función que muestra los productos
    	public function muestraTodosLosProductos(Request $request) {
            $variables = array();
            //LISTA DE PUJAS MAS BAJAS Y UNICAS DE UN PRODUCTO
            /*SELECT *,u.alias AS ganadorActual FROM pujas p JOIN users u ON p.id_usuario = u.id WHERE id_producto = 2 
            GROUP BY puntos_pujados HAVING count(puntos_pujados) = 1 ORDER BY count(puntos_pujados), puntos_pujados ASC;*/
            $productos = DB::select("SELECT *,count(pu.id_producto) AS numeroPujas, (SELECT count(*) 
                FROM users us JOIN pujas puj ON us.id = puj.id_usuario 
                WHERE us.id = ? AND puj.id_producto = pu.id_producto) AS misPujas,
            (SELECT u.alias FROM pujas p JOIN users u ON p.id_usuario = u.id 
                WHERE id_producto = pro.id_producto GROUP BY puntos_pujados HAVING count(puntos_pujados) = 1 
                ORDER BY count(puntos_pujados), puntos_pujados ASC LIMIT 1) AS ganadorActual
            FROM producto pro LEFT JOIN pujas pu USING(id_producto)  GROUP BY id_producto;",array(Auth::id()));

            $variables["productos"] = $productos;


            if (Auth::check()) {
                $user = DB::select("SELECT * FROM users WHERE id = ?;", array(Auth::id()));
                $variables["user"] = $user[0];
            }
            
            return view("productos")->with($variables);
        }

        public function muestraUnProducto(Request $request, $id) {
            $producto = DB::select("SELECT * FROM producto WHERE id_producto ='$id' AND estado = 'Pujando' ");

            //si existe
            if (sizeof($producto) > 0) {
                $user = Auth::id();


                $idPujaGanadora = DB::select("SELECT p.id_puja AS idPujaGanadora, u.alias AS aliasGanador FROM pujas p JOIN users u ON p.id_usuario = u.id 
                    WHERE id_producto = ? GROUP BY puntos_pujados HAVING count(puntos_pujados) = 1 
                    ORDER BY count(puntos_pujados), puntos_pujados ASC LIMIT 1;", array($id));

                $listaPujas = DB::select("SELECT u.alias, p.fecha, p.id_puja FROM pujas p JOIN users u ON (p.id_usuario = u.id) WHERE p.id_producto = ? ORDER BY fecha DESC LIMIT 10;",array($id));


            // Consulta para saber el número total de pujas de un producto
                $numeroPujas = DB::select("SELECT count(id_puja) AS numeroPujas FROM pujas WHERE id_producto = ?", array($id) );

            // Consulta para coger las imágenes de cada producto para mostrar en el slider
                $imagenes = DB::select("SELECT ruta FROM imagenes WHERE id_producto = ?", array($id));

                $variables = array("producto" => $producto[0], "listaPujas" => $listaPujas, "numeroPujas" => $numeroPujas[0], "imagenes" => $imagenes);

            //Si hay ganador, añadelo en la respuesta
                if ( sizeof($idPujaGanadora) > 0 ) {
                    $variables["idPujaGanadora"] = $idPujaGanadora[0]->idPujaGanadora;
                    $variables["aliasGanador"] = $idPujaGanadora[0]->aliasGanador;
                }
                
                if (Auth::check()) {
                    $user = DB::select("SELECT * FROM users WHERE id = ?;", array(Auth::id()));
                    $variables["user"] = $user[0];
                }


                return view("articulo")->with($variables); 
            } else {
             return redirect('productos');
         }
         
     }

     public function productoFinalizado(Request $request, $id){
        $producto = DB::select("SELECT * FROM producto WHERE id_producto ='$id' AND estado='Finalizado'");
        $user = Auth::id();


        $idPujaGanadora = DB::select("SELECT p.id_puja AS idPujaGanadora, u.alias AS aliasGanador, p.puntos_pujados AS puntosPujados FROM pujas p JOIN users u ON p.id_usuario = u.id 
            WHERE id_producto = ? GROUP BY puntos_pujados HAVING count(puntos_pujados) = 1 
            ORDER BY count(puntos_pujados), puntos_pujados ASC LIMIT 1;", array($id));

        $listaPujas = DB::select("SELECT u.alias, p.fecha, p.id_puja FROM pujas p JOIN users u ON (p.id_usuario = u.id) WHERE p.id_producto = ? ORDER BY fecha DESC LIMIT 10;",array($id));
        /* Las veces que se ha pujado por unos determinados puntos */
        $consultaGrafico = DB::select("SELECT puntos_pujados, count(id_usuario) AS numPujas FROM `pujas` 
            WHERE  id_producto = '$id' GROUP BY puntos_pujados");

            // Consulta para saber el número total de pujas de un producto
        $numeroPujas = DB::select("SELECT count(id_puja) AS numeroPujas FROM pujas WHERE id_producto = ?", array($id) );

            // Consulta para coger las imágenes de cada producto para mostrar en el slider
        $imagenes = DB::select("SELECT ruta FROM imagenes WHERE id_producto = ?", array($id));

        $variables = array("producto" => $producto[0], "listaPujas" => $listaPujas, "consultaGrafico" => $consultaGrafico, "numeroPujas" => $numeroPujas[0], "imagenes" => $imagenes);

            //Si hay ganador, añadelo en la respuesta
        $variables["idPujaGanadora"] = $idPujaGanadora[0]->idPujaGanadora;
        $variables["aliasGanador"] = $idPujaGanadora[0]->aliasGanador;
        $variables["puntosPujadosGanadorSubasta"] = $idPujaGanadora[0]->puntosPujados;
        
        
        if (Auth::check()) {
            $user = DB::select("SELECT * FROM users WHERE id = ?;", array(Auth::id()));
            $variables["user"] = $user[0];
        }  
        return view("productoFinalizado")->with($variables); 
    }

}