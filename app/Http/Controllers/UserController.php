<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Mail;
/*

    Controlador de usuario

*/
    class UserController extends Controller {

        public function mostrarPerfil(Request $request) {
         $id = Auth::id();
         $user = DB::select('SELECT * FROM users WHERE id = ? ', array($id));

         // Tabla perfil Mis Pujas
         $productos = DB::select("SELECT p.id_producto, pr.nombre_producto AS nombreProducto, 
            p.puntos_pujados AS puja, pr.estado AS estado FROM pujas p, producto pr 
            WHERE id_usuario = ? AND p.id_producto=pr.id_producto  GROUP BY pr.nombre_producto ORDER BY p.fecha DESC", array($id));

            // Ganador actual de la puja
         $ganador = DB::select("SELECT *,u.alias AS ganadorActual FROM pujas p JOIN users u ON p.id_usuario = u.id WHERE id_producto = 7
            GROUP BY puntos_pujados HAVING count(puntos_pujados) = 1 ORDER BY count(puntos_pujados), puntos_pujados ASC");

           // Un array que contiene todos los paises para mostrar en las opciones del select del país
         $paises = array(
            "Afghanistan",
            "Albania",
            "Algeria",
            "Andorra",
            "Angola",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bhutan",
            "Bolivia",
            "Bosnia and Herzegovina",
            "Botswana",
            "Brazil",
            "Brunei",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Cape Verde",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Colombia",
            "Comoros",
            "Congo (Brazzaville)",
            "Congo",
            "Costa Rica",
            "Cote d'Ivoire",
            "Croatia",
            "Cuba",
            "Cyprus",
            "Czech Republic",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "East Timor (Timor Timur)",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Ethiopia",
            "Fiji",
            "Finland",
            "France",
            "Gabon",
            "Gambia, The",
            "Georgia",
            "Germany",
            "Ghana",
            "Greece",
            "Grenada",
            "Guatemala",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Honduras",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran",
            "Iraq",
            "Ireland",
            "Israel",
            "Italy",
            "Jamaica",
            "Japan",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Korea, North",
            "Korea, South",
            "Kuwait",
            "Kyrgyzstan",
            "Laos",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Macedonia",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Mauritania",
            "Mauritius",
            "Mexico",
            "Micronesia",
            "Moldova",
            "Monaco",
            "Mongolia",
            "Morocco",
            "Mozambique",
            "Myanmar",
            "Namibia",
            "Nauru",
            "Nepa",
            "Netherlands",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Poland",
            "Portugal",
            "Qatar",
            "Romania",
            "Russia",
            "Rwanda",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Vincent",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia and Montenegro",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Swaziland",
            "Sweden",
            "Switzerland",
            "Syria",
            "Taiwan",
            "Tajikistan",
            "Tanzania",
            "Thailand",
            "Togo",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Vatican City",
            "Venezuela",
            "Vietnam",
            "Yemen",
            "Zambia",
            "Zimbabwe"
            );

return view("/perfil")->with(array('user' => $user[0], 'productos' => $productos, 'paises' => $paises));
}

public function actualizarPerfil(Request $request) {
    $id = Auth::id();
    $nombre = $request->input('nombre');
    $apellido = $request->input('apellido');
    $email = $request->input('email');
    $pais = $request->input('pais');
    $ciudad = $request->input('ciudad');
    $cp = $request->input('cp');
    $direccion = $request->input('direccion');

    $emailUsuario = DB::select("SELECT email FROM users WHERE email = ? AND id != ?",array($email,$id));
    if (sizeof($emailUsuario) == 0){
        DB::update('UPDATE users SET  nombre_usuario = ?, apellido_usuario = ?,email = ?, pais = ?, ciudad = ?, cp = ?, direccion = ? WHERE id = ?', array($nombre,$apellido,$email, $pais, $ciudad, $cp, $direccion, $id ));

        // Después de la modificación, hago una consulta para coger el registro, y lo envio a la vista en formato JSON
    $result = DB::select("SELECT * FROM users WHERE id = ?", array($id));
    return response()->json(['nombre' => $result[0]->nombre_usuario , 'apellido' => $result[0]->apellido_usuario, 'email' =>  $result[0]->email
     ,'pais' => $result[0]->pais, 'ciudad' =>  $result[0]->ciudad,  'cp' =>  $result[0]->cp, 'direccion' =>  $result[0]->direccion, 'estado'=>"success"]);
        // return view("/perfil");
    }else{
        return response()->json(["estado" => "fail"]);
    }

    

}

public function realizarPuja(Request $request) {
    $puntos = $request->input('puntos');
    $idProducto = $request->input("idproducto");
    $idUsuario = Auth::id();

        //comprovar que tiene los puntos necesarios para pujar
    
    $puntosActuales = Auth::user()->puntos;

    if ($puntosActuales >= abs($puntos)) {
        DB::update("UPDATE users SET puntos = puntos - ? WHERE id = ?", array($puntos, $idUsuario));
        DB::insert("INSERT INTO pujas (id_usuario, id_producto, puntos_pujados, fecha) VALUES (?, ?, ?, NOW());", array($idUsuario, $idProducto, $puntos));

        $idPuja = DB::getPdo()->lastInsertId();

        $idPujaGanadora = DB::select("SELECT p.id_puja AS idPujaGanadora, u.alias AS nombrePujaGanadora FROM pujas p JOIN users u ON p.id_usuario = u.id 
            WHERE id_producto = ? GROUP BY puntos_pujados HAVING count(puntos_pujados) = 1 
            ORDER BY count(puntos_pujados), puntos_pujados ASC LIMIT 1;", array($idProducto));

        function curl_post_async($url, $params = array()){

            $post_params = array();

            foreach ($params as $key => &$val) {
              if (is_array($val)) $val = implode(',', $val);
              $post_params[] = $key.'='.urlencode($val);
          }
          $post_string = implode('&', $post_params);

          $parts=parse_url($url);

          $fp = fsockopen($parts['host'],
            isset($parts['port'])?$parts['port']:80,
            $errno, $errstr, 30);

          $out = "POST ".$parts['path']." HTTP/1.1\r\n";
          $out.= "Host: ".$parts['host']."\r\n";
          $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
          $out.= "Content-Length: ".strlen($post_string)."\r\n";
          $out.= "Connection: Close\r\n\r\n";
          if (isset($post_string)) $out.= $post_string;

          fwrite($fp, $out);
          fclose($fp);
      }

            //coger los datos actualizados    
      $productoActualizado = DB::select("SELECT id_producto,count(*) AS numeroPujas, 
        (SELECT u.alias FROM pujas p JOIN users u ON p.id_usuario = u.id WHERE id_producto = ? GROUP BY puntos_pujados HAVING count(puntos_pujados) = 1 ORDER BY count(puntos_pujados), puntos_pujados ASC LIMIT 1) AS ganadorActual 
        FROM `pujas` WHERE id_producto = ?",array($idProducto, $idProducto));
      curl_post_async('https://serene-refuge-3117.herokuapp.com/update', $productoActualizado[0]);

      $articuloActualizado =  array("idProducto" => $idProducto,"idPuja" => $idPuja ,"usuario" => Auth::user()->alias,"fecha" => date('Y-m-d H:i:s') );

        //si hay ganador...
      if (sizeof($idPujaGanadora) > 0) {

        //enviar el nombre del ganador y su id
        $articuloActualizado["nombrePujaGanadora"] = $idPujaGanadora[0]->nombrePujaGanadora;
        $articuloActualizado["idPujaGanadora"] = $idPujaGanadora[0]->idPujaGanadora;
        //si esta puja es la ganadora
        if ($idPuja == $idPujaGanadora[0]->idPujaGanadora) {
            $articuloActualizado["pujaGanadora"] = true;
        }
    } 


    curl_post_async('https://serene-refuge-3117.herokuapp.com/updateArticulo' , $articuloActualizado);

            //ya que esta ruta se accede mediante ajax, devolvemos json
    $puntosAhora = Auth::user()->puntos - $puntos;
    return response()->json(['result' => 'success', 'message' => 'Tu puja se ha realizado con éxito',"misPuntos" => $puntosAhora]);
} else {
    return response()->json(['result' => 'error', 'message' => 'No tienes suficientes puntos para realizar esta puja']);
}
}

public function contacto(Request $request){
   $alias = $request->input('alias');
   $email = $request->input('email');
   $mensaje = $request->input('mensaje');

   DB::insert("INSERT INTO contacto VALUES (?, ?, ?)",array($alias, $email, $mensaje));

   return response()->json(['mensaje' => 'Gracias por contactar con nosotros, te responderemos lo antes posible!']);
}

public function mostrarTabla(Request $request) {
    $id = Auth::id();
    $idProducto = $request->input('idProducto');
    $producto = DB::select("SELECT p.puntos_pujados AS puja, ADDDATE(p.fecha , INTERVAL 2 HOUR) AS fecha FROM pujas p
        WHERE id_usuario = ? AND p.id_producto = ?  ORDER BY p.puntos_pujados ASC",array($id,$idProducto));

    return response()->json(['producto' => $producto]);
}

public function compraRealizada(Request $request) {

    return view("compraRealizada");
}

}