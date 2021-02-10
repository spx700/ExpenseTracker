<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="./images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap"
      rel="stylesheet"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap"
      rel="stylesheet"
    />
  <link rel="stylesheet" href="css/reportstyle.css">
    <title>Expense Tracker - Custom report</title>
</head>
<body>
<?php
session_start();
if($_SESSION['Name']==null)
// header('location:index.php');
echo'<script>location.href="index.php"</script>';
else{
    $conn = mysqli_connect("127.0.0.1", "root", "", "expensetracker");
    $from = $_POST['duration-from'];
    $to = $_POST['duration-to'];
  
    $tmp = $_SESSION['Table'];
    $from = $from."";
    $to = $to."";
    $query = "SELECT tr_date, tr_time, tr_amt, tr_reason from $tmp where tr_date between '$from' and '$to' order by tr_id desc";
    $result = mysqli_query($conn,$query); 
    $rowcount = mysqli_num_rows($result);

    $tfrom = explode("-",$from)[2].'-'.explode("-",$from)[1].'-'.explode("-",$from)[0];
    $tto = explode("-",$to)[2].'-'.explode("-",$to)[1].'-'.explode("-",$to)[0];

    $res = mysqli_query($conn, "SELECT SUM(AMT) as 'total_deposit' from $tmp where tr_date between '$from' and '$to' and tr_amt LIKE '+%'");
    $deposit = mysqli_fetch_assoc($res)['total_deposit'];
    $res = mysqli_query($conn, "SELECT SUM(AMT) as 'total_withdrawl' from $tmp where tr_date between '$from' and '$to' and tr_amt LIKE '-%'");
    $withdrawl = mysqli_fetch_assoc($res)['total_withdrawl'];
    ?>

<div class="header">
   <div class="logo">
          <span
            >EXPENSE TRACKER<span style="font-weight: 100; margin: 0 !important"
              >™
            </span>
          </span>
        </div>
        <a href="logout.php">
        <button button>Logout</button> 
        </a>
</div>
 
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 920.22 1198.2"><defs><style>.cls-1,.cls-10,.cls-4,.cls-9{fill:none;}.cls-1,.cls-2{stroke:#ff5415;stroke-miterlimit:10;}.cls-1,.cls-4{stroke-linecap:round;}.cls-1{stroke-width:6px;}.cls-2{fill:rgb(255, 230, 230);}.cls-10,.cls-2,.cls-9{stroke-width:5px;}.cls-3{fill:#3d0e00;}.cls-4,.cls-9{stroke:#ff4400;}.cls-10,.cls-4,.cls-9{stroke-linejoin:round;}.cls-4{stroke-width:10px;}.cls-5{fill:#dd4939;}.cls-6{fill:#e4955e;}.cls-7{fill:#eba06b;}.cls-8{fill:#f1f0ff;}.cls-10{stroke:#a81f0d;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Слой_1" data-name="Слой 1"><g id="_3" data-name="3"><g id="CHAIR"><polyline class="cls-1" points="275.97 827.77 275.97 1061 139.47 1195.19"/><polyline class="cls-1" points="310.46 827.77 310.46 1061 446.97 1195.19"/><line class="cls-1" x1="292.55" y1="1063.72" x2="292.55" y2="1195.2"/><path class="cls-2" d="M243.58,795.74H346.09a0,0,0,0,1,0,0v0a32,32,0,0,1-32,32H275.61a32,32,0,0,1-32-32v0a0,0,0,0,1,0,0Z"/><polygon class="cls-2" points="232.83 738.46 201.83 738.46 189.75 671.14 220.75 671.14 232.83 738.46"/><path class="cls-2" d="M472.74,752.8v26.09c0,3.45-9.45,6.69-25.88,9.44-31.56,5.29-88.86,8.83-154.32,8.83-99.51,0-180.19-8.18-180.19-18.27V752.8c0,5.11,20.72,9.73,54.11,13.05,32.5,3.23,77,5.22,126.08,5.22s93.59-2,126.09-5.22c10.84-1.08,20.34-2.29,28.23-3.61C463.29,759.49,472.74,756.25,472.74,752.8Z"/><path class="cls-2" d="M472.74,752.8c0,3.45-9.45,6.69-25.88,9.44-7.89,1.32-17.39,2.53-28.23,3.61-32.5,3.23-77,5.22-126.09,5.22s-93.58-2-126.08-5.22c-33.39-3.32-54.11-7.94-54.11-13.05,0-10.09,80.68-18.27,180.19-18.27,79.12,0,146.33,5.17,170.56,12.36C469.35,748.75,472.74,750.73,472.74,752.8Z"/><path class="cls-2" d="M238,680.35H180.92c-50.49,0-98.63-40.24-107.54-89.87L53.07,477.21c-8.9-49.63,24.81-89.87,75.3-89.87h57.11c50.49,0,98.63,40.24,107.53,89.87l20.32,113.27C322.23,640.11,288.52,680.35,238,680.35Z"/><line class="cls-1" x1="275.97" y1="1061" x2="310.47" y2="1061"/></g><g id="WOMAN"><g id="HAIR"><path class="cls-3" d="M180.59,285c33.64-42.95,5.43-90.58,13.07-116.32,14.93-50.36,79.81,10.59,105.55-51.75,0,0,38.07,26.67,42,21.43l98.47-9.18c35.76-38.15,23-79.92,8.43-96,0,0-45-51.26-96.24-26.41-27.47,13.33-49.84,55.14-55.35,88-5.95,35.53-59.09-70-136.41-34.26C109.49,84,147.89,157.13,88.72,158.88,11,161.19-25.91,238.34,65.2,305,109,337.09,158.27,313.51,180.59,285Z"/><line class="cls-4" x1="290.83" y1="100.75" x2="300.17" y2="118.86"/><ellipse class="cls-3" cx="29.2" cy="337.4" rx="39.84" ry="24.65" transform="translate(-277.6 193.99) rotate(-60)"/><line class="cls-4" x1="44.91" y1="294.72" x2="60.23" y2="306.9"/></g><path id="SKIRT" class="cls-5" d="M215,518S87.08,701.26,219.27,748.5c87.92,31.42,264.49,28.44,372.91,22.91a114.91,114.91,0,0,0,107.36-95.07h0a75.52,75.52,0,0,0-48.72-84C575.59,565.16,448.67,517.94,372.07,505,372.07,505,309,538.05,215,518Z"/><g id="LEGS"><g id="RIGHT"><path class="cls-3" d="M804.18,1103.94s-34.76,13.18-9.27,87.89h5.69s5.73-37.6,12.09-37.92,24.18,37.92,33.41,37.92h74.12s-1.59-15.13-13-16.76-35-25.72-35-25.72Z"/><path class="cls-6" d="M674.34,602.43c46.09,14.44,85.2,329.29,197.84,546.92,0,0-61.56-4.39-68-45.41,0,0-186.87-192.63-191.86-307.62S646,593.56,674.34,602.43Z"/></g><g id="LEFT"><path class="cls-3" d="M604.26,1103.94s-34.76,13.18-9.27,87.89h5.69s5.73-37.6,12.09-37.92,24.18,37.92,33.41,37.92H720.3s-1.59-15.13-13-16.76-35-25.72-35-25.72Z"/><path class="cls-7" d="M604.47,1104.24s-76.2-246-55.83-342.4C573.45,644.46,640.21,581,672.18,602.43s-54.83,352.15-23.1,501.81c3.92,18.47,25.54,47.12,25.54,47.12S592.54,1142.82,604.47,1104.24Z"/></g></g><path id="TORSO" class="cls-5" d="M173.29,216.24c14-11.34,69.74-39.4,133.66-51.74s95.37,9.42,105.12,24c13.14,19.61-7.17,42.9,2.37,100.77,7.16,43.46,24.06,74.38,15.25,96.74-13.44,34.09-49.9,34.68-51.06,114.7-.44,29.88-146.3,31.61-163,17.28S136.09,246.36,173.29,216.24Z"/><g id="HAND"><path class="cls-7" d="M161.31,238c-20.3,86.89,35.78,222.45,69.22,222.45C301.79,460.48,424.67,328,424.67,328l-6.8-24.7L248.42,387.53s-10.09-104.9-19.69-141.4C218.92,208.81,171.66,193.75,161.31,238Z"/><ellipse class="cls-8" cx="538.79" cy="238.34" rx="51.88" ry="43.65" transform="translate(-35.78 368.63) rotate(-36.64)"/><ellipse class="cls-9" cx="533.44" cy="226.52" rx="52.58" ry="43.58" transform="matrix(0.8, -0.6, 0.6, 0.8, -29.78, 363.1)"/><path class="cls-10" d="M568.22,224.64c-2.35,18.32-19.84,34-39.05,35.05"/><path class="cls-2" d="M485.07,268.87l-56.91,66.19a8.33,8.33,0,0,0,1.52,11.26h0a7.39,7.39,0,0,0,10.73-1.39l56.91-66.2a8.33,8.33,0,0,0-1.52-11.26h0A7.38,7.38,0,0,0,485.07,268.87Z"/><path class="cls-7" d="M412.84,306.19c7.42-6.91,56-19.08,60.94-16S518,300.72,518,300.72s-.78,9.39-16.35,7.77c-18.08-1.88-21.91,1.92-21.91,1.92s2.5,9.89-3.11,13.66,1.81,9.1-6,16.42c-4.58,4.28-4.77,9.6-10.74,10.73s-42.51-17.36-48.55-28.67C406.18,313,408.43,310.29,412.84,306.19Z"/></g><g id="NECK"><path class="cls-7" d="M238.88,183.3c11.67-4.89,66-39.59,94.14-76.89l18.05,52.5s12,53.34-55.44,57C253.84,218.12,238.88,183.3,238.88,183.3Z"/><path class="cls-6" d="M336.23,202.89c-24.49-22.8-20.11-67-3.9-95.58q.36-.45.69-.9l18.06,52.5S357.17,186,336.23,202.89Z"/></g><path id="HEAD" class="cls-7" d="M424.45,67.46c17.14,1.12,29,26.19,21.05,49s-39.62,68.34-61.28,66.77c-35.08-2.53-53.09-51.18-52.32-71.52,0,0,.29-23.32,26.06-18,21.19,4.35,42.18-1.38,51.27-12.9S424.45,67.46,424.45,67.46Z"/></g></g></g></g></svg>
<div class="container">
  <div class="heading">
    Showing <?php echo '<span>'.$rowcount.'</span> records from <span>'.$tfrom.'</span> to <span>'.$tto .'</span>'; ?>. 
  </div>
 <div class="report">

 <?php
 if($rowcount)
 {

          echo '<table><tr>
              <th colspan=2>Time of transaction</th>
              <th>Activity</th>
              <th>Purpose</th>
              </tr>';
          for($i=0;$i<$rowcount;$i++)
          {
              $row=mysqli_fetch_assoc($result);
              $symb = $row['tr_amt'];
              if($symb[0] == "+")
              echo '<tr style="background:var(--green);">
              <td>'.$row['tr_date'].'</td>
              <td>'.$row['tr_time'].'</td>
              <td>'.$row['tr_amt'].'</td>
              <td>'.$row['tr_reason'].'</td>
              </tr>';
              else
              echo '<tr style="background:var(--red);">
              <td>'.$row['tr_date'].'</td>
              <td>'.$row['tr_time'].'</td>
              <td>'.$row['tr_amt'].'</td>
              <td>'.$row['tr_reason'].'</td>
              </tr>';
          }
          echo '</table>';
 }
 else{
   echo '<span id="error">No records found.</span>';
   $deposit = "NA";
   $withdrawl = "NA";
 }
}
?>
 </div>   

 <div class="status">
   <div class="dep_class">
                <span style="font-size:1.2vw !important;"> Total deposit </span><br>
        <?php
        echo $deposit; ?>
        </div>
        <div class="wd_class">
         <span style="font-size:1.2vw !important;"> Total withdrawl </span><br>
        <?php
        echo $withdrawl;
         ?>
        </div>
 </div>
  </div>

</body>
</html>