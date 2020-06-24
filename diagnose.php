<?php

$userinput = $_POST['value'];


$a = array_fill(0, 132, 0);
$b = array('itching',
'skin_rash',
'nodal_skin_eruptions',
'continuous_sneezing',
'shivering',
'chills', 
'joint_pain', 
'stomach_pain',
'acidity',
'ulcers_on_tongue',
'muscle_wasting',
'vomiting',
'burning_micturition', 
'spotting_ urination',
'fatigue',
'weight_gain',
'anxiety',
'cold_hands_and_feets',
'mood_swings',
'weight_loss',
'restlessness',
'lethargy',
'patches_in_throat',
'irregular_sugar_level',
'cough',
'high_fever',
'sunken_eyes',
'breathlessness',
'sweating',
'dehydration',
'indigestion',
'headache',
'yellowish_skin',
'dark_urine',
'nausea',
'loss_of_appetite',
'pain_behind_the_eyes',
'back_pain',
'constipation',
'abdominal_pain',
'diarrhoea',
'mild_fever',
'yellow_urine',
'yellowing_of_eyes',
'acute_liver_failure',
'fluid_overload',
'swelling_of_stomach',
'swelled_lymph_nodes',
'malaise',
'blurred_and_distorted_vision',
'phlegm',
'throat_irritation',
'redness_of_eyes',
'sinus_pressure',
'runny_nose',
'congestion',
'chest_pain',
'weakness_in_limbs',
'fast_heart_rate',
'pain_during_bowel_movements',
'pain_in_anal_region',
'bloody_stool',
'irritation_in_anus',
'neck_pain',
'dizziness',
'cramps',
'bruising',
'obesity',
'swollen_legs',
'swollen_blood_vessels',
'puffy_face_and_eyes',
'enlarged_thyroid',
'brittle_nails',
'swollen_extremeties',
'excessive_hunger',
'extra_marital_contacts',
'drying_and_tingling_lips',
'slurred_speech',
'knee_pain',
'hip_joint_pain',
'muscle_weakness',
'stiff_neck',
'swelling_joints',
'movement_stiffness',
'spinning_movements',
'loss_of_balance',
'unsteadiness',
'weakness_of_one_body_side',
'loss_of_smell',
'bladder_discomfort',
'foul_smell_of urine',
'continuous_feel_of_urine',
'passage_of_gases',
'internal_itching',
'toxic_look_(typhos)', 
'depression',
'irritability',
'muscle_pain',
'altered_sensorium',
'red_spots_over_body',
'belly_pain',
'abnormal_menstruation', 
'dischromic _patches',
'watering_from_eyes',
'increased_appetite',
'polyuria',
'family_history',
'mucoid_sputum',
'rusty_sputum',
'lack_of_concentration',
'visual_disturbances',
'receiving_blood_transfusion',
'receiving_unsterile_injections',
'coma',
'stomach_bleeding',
'distention_of_abdomen',
'history_of_alcohol_consumption',
'fluid_overload',
'blood_in_sputum',
'prominent_veins_on_calf',
'palpitations',
'painful_walking',
'pus_filled_pimples',
'blackheads',
'scurring',
'skin_peeling',
'silver_like_dusting',
'small_dents_in_nails',
'inflammatory_nails',
'blister',
'red_sore_around_nose',
'yellow_crust_ooze');




function callAPI($method, $url, $data){
  $curl = curl_init();
  switch ($method){
     case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
     default:
        if ($data)
           $url = sprintf("%s?%s", $url, http_build_query($data));
  }
  // OPTIONS:
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
     'Content-Type: application/json',
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  // EXECUTE:
  $result = curl_exec($curl);
 
  echo '<h3>Prediction results Show diseases will be   :   '.$result.'</h3>';  

  
  if(!$result){die("Connection Failure");
      echo $result;
}

  curl_close($curl);

  return $result;
}




$l1 = sizeof($userinput);
//print_r($l1);
$l2 = sizeof($b);
//print_r($l2);

$l3 = sizeof($a);
//print_r($l3);



for ($x = 0; $x < $l1; $x++) {
  for ($y = 0; $y < $l2; $y++) {

    if($userinput[$x] == $b[$y])

    {
    	$a[$y] = 1;
    }
    else{
    	continue;
    }
  }
}

$str = "" ;
for ($x = 0; $x < $l2; $x++) 
      $str = $str.$a[$x];

$make_call = callAPI('POST', 'http://localhost:5000/predict', json_encode($str));
$response = json_decode($make_call, true);
$errors   = $response['response']['errors'];
$data     = $response['response']['data'][0];

  






?>