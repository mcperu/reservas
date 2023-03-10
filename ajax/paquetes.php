<?php
session_start();
require_once "../modelos/Paquetes.php";
$nombre_ = "Paquete";
$paquetes = new Paquetes();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$fechapedido=isset($_POST["fechapedido"])? limpiarCadena($_POST["fechapedido"]):"";
$idestadopedido=isset($_POST["idestadopedido"])? limpiarCadena($_POST["idestadopedido"]):"";
$monedapedido=isset($_POST["monedapedido"])? limpiarCadena($_POST["monedapedido"]):"";

    switch($_GET["op"]){


        
        case 'guardaryeditar':

            if(empty($idpedido)){
                $rspta=$paquetes->insertar($programa, $programa_en, $nombre, $nombre_en, $precio, $imagen);
                echo $rspta ? "$nombre_ registrado": "El $nombre_ no se puedo registrar";
            }else{
                $rspta=$paquetes->editar($id, $programa, $programa_en, $nombre, $nombre_en, $precio, $imagen);
                echo $rspta ? "$nombre_ actualizado": "El $nombre_ no se puedo actualizar";
            }
        break;

        case 'desactivar';
                $rspta=$paquetes->desactivar($idpedido);
                echo $rspta ? "Pedido desactivado": "El pedido no se puedo desactivar";
        break;
        
        case 'activar':
            $rspta=$paquetes->activar($idpedido);
            echo $rspta ? "Pedido activado": "El pedido no se puedo activar";
        break;

        case 'mostrar':
            $rspta=$paquetes->mostrar($idpedido);
            echo json_encode($rspta);
        break;
        
        case 'listar':
            $rspta=$paquetes->listar();
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $url='../reportes/exTicket.php?id=';
              //  $cliente = $reg->idusuario;
                $data[]=array(                    
                    "0"=>($reg->id)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id.','.$reg->id.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->id.')"><i class="fa fa-close"></i></button>':
                    ' <button class="btn btn-warning" onclick="mostrar('.$reg->id.','.$reg->id.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->programa,
                    "2"=>$reg->programa_en,
                    "3"=>$reg->nombre,    
                    "4"=>$reg->nombre_en,
                    "5"=>$reg->precio,
                    "6"=>$reg->imagen 
                );
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);
        break;

        case 'listarpedidosgeneral':
            $rspta=$paquetes->listarpedidosgeneral();
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $url='../reportes/exTicket.php?id=';
                $cliente = $reg->idusuario;
                $direcTienda = $reg->directienda;
                $direcTiendaShort = substr($direcTienda, 0, 4);
                $data[]=array(                    
                    "0"=>($reg->idpedido)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpedido.','.$cliente.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpedido.')"><i class="fa fa-close"></i></button>'.'<a target="_blank" href="'.$url.$reg->idpedido.'"> <button class="btn btn-info"><i class="fa fa-file"></i></button></a>':
                    ' <button class="btn btn-warning" onclick="mostrar('.$reg->idpedido.','.$cliente.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idpedido.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->nomtienda.' / '.$reg->codigotienda,
                    "2"=>$reg->nomusuario,
                    "3"=>$reg->telusuario,    
                    "4"=>$reg->fechapedido,
                    "5"=>$reg->estado,
                    "6"=>'S/ '.$reg->total 
                );
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);
        break;        
            
        case 'mostrardetallepedido':
            //Recibimos el idingreso
            $id=$_GET['id'];
            $idcliente=$_GET['idcliente'];
    
            $rspta = $paquetes->mostrardetallepedido($id);
            $total=0;
            echo '<thead style="background-color:#A9D0F5">
                 <th>Opciones</th> <th>Art??culo</th> <th>Cantidad</th> <th>Precio</th> <th>Subtotal</th>
                 </thead>';
    
            while ($reg = $rspta->fetch_object())
                    {   
                        echo '<tr class="filas"><td> <img src="../files/productos/'.$reg->imagenproducto.'" height="42" width="42"></td><td>'.$reg->nombreproductocorto.'</td><td>'.$reg->unidadeslineaspedido.'</td><td>'.$reg->preciolineaspedido.'</td><td>'.number_format($reg->preciolineaspedido*$reg->unidadeslineaspedido, 2, ',', ' ').'</td></tr>';
                        
                        $total=$total+($reg->preciolineaspedido*$reg->unidadeslineaspedido);
                        $total_=number_format($total, 2, ',', ' ');
                    }
            echo '<tr>
                    <th>Sub Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                    <h4 id="total">S/.'.$total_.'</h4> <input type="hidden" name="total_compra" id="total_compra">
                    </th> 
                  </tr>';
            
                $rspta2=$paquetes->listarpedidos_delivery($idcliente);
                while ($reg = $rspta2->fetch_object())
                {            
                echo '<tr>
                        <th>Delivery</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4 id="total">S/'.$reg->delivery.'</h4><input type="hidden" name="total_compra" id="total_compra"></th> 
                    </tr>';
                }
                $rspta=$paquetes->listarpedidos_delivery($idcliente);

                while ($reg = $rspta->fetch_object())
                {
                    echo '<tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h4 id="total">S/'.$reg->total.'</h4><input type="hidden" name="total_compra" id="total_compra"></th> 
                </tfoot>';  
                }
        break;
    
        case "selectUsuario":
            require_once "../modelos/Usuario.php";
            $usuario = new Usuario();
            $rspta = $usuario->listar();
            while ($reg = $rspta->fetch_object())
                    {
                        echo '<option value=' . $reg->idusuario . '>' . $reg->nomusuario . '</option>';
                    }
        break;

        case "selectEstado":
            require_once "../modelos/Producto.php";
            $estado = new Producto();
            $rspta = $estado->listarProductoEstado();
            while ($reg = $rspta->fetch_object())
                    {
                        echo '<option value=' . $reg->idproductoestado . '>' . $reg->nomproductoestado . '</option>';
                    }
        break;

    }
