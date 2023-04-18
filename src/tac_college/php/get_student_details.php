<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php

$func = $_GET['func'];

switch ($func) {
	case 'title':
		$index_no = $_POST['index_no'];

    	$qry="SELECT title FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_title = $view_all_query_row['title'];
                
                $i +=1;
                echo '<option>'.$view_title.'</option>';
            }
        }

        break;

    case 'surname':
        $index_no = $_POST['index_no'];

        $qry="SELECT surname FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_surname = $view_all_query_row['surname'];
                
                $i +=1;
                echo $view_surname;
            }
        }

        break;

    case 'firstname':
        $index_no = $_POST['index_no'];

        $qry="SELECT fname FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_fname = $view_all_query_row['fname'];
                
                $i +=1;
                echo $view_fname;
            }
        }

        break;

    case 'other_name':
        $index_no = $_POST['index_no'];

        $qry="SELECT othername FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_othername = $view_all_query_row['othername'];
                
                $i +=1;
                echo $view_othername;
            }
        }

        break;

    case 'gender':
        $index_no = $_POST['index_no'];

        $qry="SELECT gender FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_gender = $view_all_query_row['gender'];
                
                $i +=1;
                echo '<option>'.$view_gender.'</option>';
            }
        }

        break;


    case 'address':
        $index_no = $_POST['index_no'];

        $qry="SELECT address FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_address = $view_all_query_row['address'];
                
                $i +=1;
                echo $view_address;
            }
        }

        break;

    case 'email':
        $index_no = $_POST['index_no'];

        $qry="SELECT email FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_email = $view_all_query_row['email'];
                
                $i +=1;
                echo $view_email;
            }
        }

        break;

    case 'tel':
        $index_no = $_POST['index_no'];

        $qry="SELECT tel FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_tel = $view_all_query_row['tel'];
                
                $i +=1;
                echo $view_tel;
            }
        }

        break;

    case 'nationality':
        $index_no = $_POST['index_no'];

        $qry="SELECT nationality FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_nationality = $view_all_query_row['nationality'];
                
                $i +=1;
                echo $view_nationality;
            }
        }

        break;

    case 'home_town':
        $index_no = $_POST['index_no'];

        $qry="SELECT home_town FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_home_town = $view_all_query_row['home_town'];
                
                $i +=1;
                echo $view_home_town;
            }
        }

        break;

    case 'dob':
        $index_no = $_POST['index_no'];

        $qry="SELECT dob FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_dob = $view_all_query_row['dob'];
                
                $i +=1;
                echo $view_dob;
            }
        }

        break;

    case 'pob':
        $index_no = $_POST['index_no'];

        $qry="SELECT pob FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_pob = $view_all_query_row['pob'];
                
                $i +=1;
                echo $view_pob;
            }
        }

        break;

    case 'm_status':
        $index_no = $_POST['index_no'];

        $qry="SELECT m_status FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_m_status = $view_all_query_row['m_status'];
                
                $i +=1;
                echo '<option>'.$view_m_status.'</option>';
            }
        }

        break;

    case 'profession':
        $index_no = $_POST['index_no'];

        $qry="SELECT profession FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_profession = $view_all_query_row['profession'];
                
                $i +=1;
                echo $view_profession;
            }
        }

        break;

    case 'employer':
        $index_no = $_POST['index_no'];

        $qry="SELECT employer FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_employer = $view_all_query_row['employer'];
                
                $i +=1;
                echo $view_employer;
            }
        }

        break;

    case 'position':
        $index_no = $_POST['index_no'];

        $qry="SELECT position FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_position = $view_all_query_row['position'];
                
                $i +=1;
                echo $view_position;
            }
        }

        break;

    case 'b_address':
        $index_no = $_POST['index_no'];

        $qry="SELECT b_address FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_b_address = $view_all_query_row['b_address'];
                
                $i +=1;
                echo $view_b_address;
            }
        }

        break;

    case 'module':
        $index_no = $_POST['index_no'];

        $qry="SELECT module FROM students_modules WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_module = $view_all_query_row['module'];
                
                $i +=1;
                echo '<option>'.$view_module.'</option>';
            }
        }

        break;

    case 'program':
        $index_no = $_POST['index_no'];

        $qry="SELECT program FROM programs, students_modules WHERE programs.programID = students_modules.programID AND students_modules.index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_program = $view_all_query_row['program'];
                
                $i +=1;
                echo '<option>'.$view_program.'</option>';
            }
        }

        break;


        default:
		echo '<script type="text/javascript">
            alert("Wrong Index Number");

         </script>
         ';
		break;
    }
    
?>