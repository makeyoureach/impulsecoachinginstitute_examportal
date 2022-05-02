<?php
  
    // require_once('../connection.php');
    $output='hello';
    $message='';
    $total= 0;

    if(isset($_POST['id']) && isset($_POST['category'])){
        
        $id = $_POST['id'];
        $category = $_POST['category'];
        $sql = '';
        
        if( $category == 'section1' ){
            $sql = "select * from tnpsc_section1 ck where questionno = ".$id;
        }else if( $category == 'section2' ){
            $sql = "select * from tnpsc_section2 ck where questionno = ".$id;
        }

        $result = mysqli_query($con, $sql);
        $output='EMPTY';
        while($row = mysqli_fetch_assoc($result)) {
            $output="<div class='card question-card'>
            <div class='card-header question-box'>
            <p><span style='font-size:17px; font-weight:bold; padding:5px'>Question ".$row["questionno"]."</span></p>
            <p class='tamil-question'>
            ".$row["tamilquestion"]."
            </p>
            <p class='english-question'>
            ".$row["englishquestion"]."
            </p>
            </div>

            <div class='card-body option-box'>
                <ul>
                    <li>
                        <input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios1' value='option1' checked>
                        <label class='form-check-label' for='exampleRadios1'>".$row["option1"]."</label>
                    </li>
                    <li>
                        <input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios1' value='option1' checked>
                        <label class='form-check-label' for='exampleRadios1'>".$row["option2"]."</label>
                    </li>
                    <li>
                        <input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios1' value='option1' checked>
                        <label class='form-check-label' for='exampleRadios1'>".$row["option3"]."</label>
                    </li>
                    <li>
                        <input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios1' value='option1' checked>
                        <label class='form-check-label' for='exampleRadios1'>".$row["option4"]."</label>
                    </li>
                    <li>
                        <input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios1' value='option1' checked>
                        <label class='form-check-label' for='exampleRadios1'>".$row["option5"]."</label>
                    </li>
                </ul>
            </div>
        </div>";
        }
        mysqli_close($con);
    }

    $data['output']=$output;
    $data['total']=$total;

  echo json_encode($data);       
  ?>