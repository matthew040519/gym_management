<?php

include('../include/connection.php');
session_start();
$package_id = $_POST['package'];
                    $id = $_POST['instructor_id'];
                    $member_id = $_POST['member_id'];
                    $schedule = $_POST['schedule'];
                    $mop = $_POST['mop'];
                    date_default_timezone_set('Asia/Manila');
                    $tdate = date("Y-m-d");
                    $totalPay = $_POST['amount'];

                    $query = mysqli_query($con, "INSERT INTO member_package (`member_id`, `package_id`, `instructor_id`, `tdate`, `schedule`, `MOP`, `amount`)
                    VALUES ('$member_id', '$package_id', '$id', '$tdate', '$schedule', '$mop', '$totalPay')");

                    if($query)
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "failed!";
                    }
