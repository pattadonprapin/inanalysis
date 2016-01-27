    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Mainmodel extends CI_Model {

    public function __construct()
    {
    parent::__construct();

    }




    //--------------------------------------------------INGREDIENT-------------------------------------------------------------//


    function foodingredientsave($data){

    $this->db->insert('ingredientinfo',$data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
    }




    function getingredientinfo(){
    $data="";
    $query = $this->db->get('ingredientinfo');
    foreach ($query->result_array() as $key => $value) {
    $data[$key]= $value;
    }
    return $data;
    }



    function getingredientedit($id){
    $data="";
    $this->db->where('id', $id);  
    $this->db->from('ingredientinfo');
    $query = $this->db->get();
    foreach ($query->result_array() as $key => $value) {
    $data = $value;
    }
    return $data;
    }



    function foodingredientupdate($data,$id){
    $this->db->where('id', $id);
    $this->db->update('ingredientinfo',$data);
    }



    function deleteingredientinfo($i) {

    $this->db->where('id', $i);
    $this->db->delete('ingredientinfo');
    }





    //--------------------------------------------------FOOD-------------------------------------------------------------//



    function getin($idfood)
    {
    $data = "";
    $this->db->select('ingredientID');
    $this->db->select('ingredientAmount');
   // $this->db->select('ingredientDetail');
     $this->db->select('refin_foodID');



    $this->db->where('refin_foodID', $idfood);
    $this->db->where("ingredientStatus !=", 99);
    $query = $this->db->get('food_ingreditent_order');
    foreach ($query->result_array() as $key => $value) {
    $data[$key] = $value;
    }
    return $data;
    }


function showaddfoodname(){

   $data="";
      $this->db->select('ingredientinfoID');
   $this->db->select('ingredient');
    $query = $this->db->get('ingredientinfo');
    foreach ($query->result_array() as $key => $value) {
    $data[$key] = $value;
    }
    return $data;

}



    function addfoodname(){

    //AddFood
    $foodname = $this->input->post('foodname');
   
    $type = $this->input->post('type');
    print_r($type);
    
    $data = array(
    'foodName' => $foodname,
    'foodUpdatedDate' =>date('Y-m-d H:i:s'),
    'foodCreatedDate' =>date('Y-m-d H:i:s'),
    );

    $this->db->insert('food', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;


    }


// ----------------------------------------------------------------------------------------------------------//

    function addingredientamount($dataingredient){
      
    $this->db->insert('food_ingreditent_order',$dataingredient);
    }

    //    function addingredientref($refingredientinfo){
    // $this->db->insert('ingredient', $refingredientinfo);
    // }

  




    function view()
    {
    $data = "";
    $this->db->select('*');
    $this->db->where("foodStatus !=", 99);

    $this->db->from('food');

    // $this->db->join('direction', 'food.foodID = direction.ref_foodID','left');
    $this->db->join('image', 'food.foodID = image.refpic_foodID','left');
    $query = $this->db->get();


    foreach ($query->result_array() as $key => $value) {

    if (isset($value["imageTitle"])) {
    $value["imageTitle"] = "http://localhost/inanalysis/images/".$value["imageTitle"];
    }
    $value["in"] =  $this->getin($value["foodID"]);
    $data[$key] = $value;

    }
    return $data;
    }





    function delete($i) {
    // $data = array(
    // 'foodStatus' => "99"
    // );
    $this->db->where('foodID', $i);
    $this->db->delete('food');
    // $this->db->update('food', $data);


    $dataingredient = array(
    'ingredientStatus' => "99"
    );

    $this->db->where('refin_foodID', $i);
    $this->db->delete('food_ingreditent_order');
    // $this->db->update('food_ingreditent_order', $dataingredient);


    $dataimage = array(
    'imageStatus' => "99"
    );

    $this->db->where('refpic_foodID', $i);
    $this->db->update('image', $dataimage);

    $this->db->select('imageTitle');
    $this->db->where('refpic_foodID', $i);
    $query = $this->db->get('image');
    foreach ($query->result() as $row) {
    return $row->imageTitle;
    }
    }



    function edit($id) {
    $data ="";
    $this->db->select('*');

    $this->db->where('foodID', $id);  

    $this->db->from('food');
    // $this->db->join('direction', 'food.foodID = direction.ref_foodID','left');
    $this->db->join('image', 'food.foodID = image.refpic_foodID','left');

    $query = $this->db->get();
    foreach ($query->result_array() as $key => $value) {

    if (isset($value["imageTitle"])) {
    $value["imageTitle2"] = $value["imageTitle"];
    $value["imageTitle"] = "http://localhost/inanalysis/images/".$value["imageTitle"];
    }

    $value["in"] =  $this->getin($value["foodID"]);
    $data = $value;
    }
    return $data;



    }

    function updatefood($data,$id) {

    $this->db->where('foodID', $id);
    $this->db->update('food', $data);
    }


    function updateingredient($dataingredient,$id) {

    if($id == 0){
    $this->db->insert('food_ingreditent_order', $dataingredient);
              

               }

    $this->db->where('ingredientID',$id);
    $this->db->update('food_ingreditent_order', $dataingredient);
    }


    function deleteingredient($id) {
 // $data = array(
 //   'ingredientStatus' => "99"
 //   );

   $this->db->where('ingredientID', $id);
  // $this->db->update('ingredient', $data);
   $this->db->delete('food_ingreditent_order');


 }










    }



































































