
<?php
session_start();
include('dbconnect.php');
if(isset($_SESSION['userid']))
{
   
   

   if(isset($_POST['subrev']))
   {
          $FormErrors=array();

       if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['date'])||empty($_POST['budget'])||empty($_POST['guests']))
           {
               $FormErrors[]='FILL YOUR INFO';
           }
      
       if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
       {
           $FormErrors[]='Email Is Not valid';
       }
       if ($_POST['budget'] <0 || $_POST['guests'] < 0)
       {
           $FormErrors[]='FILL YOUR INFO Correctly';
       }

     
       if (  new DateTime($_POST['date']) < new DateTime(date('Y/m/d')))
       {
           $FormErrors[]='Sorry this Date is Unavailable';
       }
     
       $res = selectQuery("requests"," DateEvent","1=1");
       if(mysqli_num_rows($res) > 0)
       {
           while($data = mysqli_fetch_array($res))
           {
              if($_POST['date'] == $data['DateEvent'] )
              {
                $FormErrors[]='Sorry this Date is Reserved';

              }
           
           }
       }
       if (empty($FormErrors)) 
       {
         $userid= $_SESSION['userid'];
           $name=$_POST['name'];
           $date=$_POST['date'];
           $email=$_POST['email'];
           $budget=$_POST['budget'];
           $guests=$_POST['guests'];
           $notes=$_POST['notes'];
               $boolAdd = insertQuery("requests", "NameCouple,Email,DateEvent,NumberOFGuests,Budget,Notes,UserID","'$name','$email','$date','$guests','$budget','$notes','$userid'");
               if($boolAdd)
               {
                  ?>
                        <div id="success" class="modal modal-message fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-close"></i>
                            </button>
                            <h2>Thank you</h2>
                            <p>Your message is successfully sent...</p>
                        </div>
                    </div>
                </div>
            </div>
                  <?php
                 
               }

               else
               {
                   
                   echo mysqli_error($mysql_link);
               }




      }
      else
      {
        foreach($FormErrors as $error)
        {
            echo $error . "</br>";
        }
      }
    }
    else
    {
        include('reservation.html');
    }
}   
else
{
    include('login.html');
}


  