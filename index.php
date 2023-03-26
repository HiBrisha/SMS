<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MF SmartSite</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js"
        type="text/javascript"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>My Website</title>
    <link rel="stylesheet" href="./ux.css">
</head>

<body>
    <!----------------------------------------------------------------------------------------------------------------------->
    <!--Header-->
    <header>
        <img id="Cs_lg" src="./pictures/logo_Icon/MF_Logo.png" alt="">
        <div class="Header_Content">
            <div class="Header_Lb">
                <div class="Header_Title">
                    <h3>THÔNG TIN CHI TIẾT TRẠM ĐÀ NẴNG</h3>
                </div>
            </div>
            <div class="Header_Sel">
                <img src="./pictures/logo_Icon/Map_Icon.png" alt="" srcset="">
            </div>
        </div>
        <img id="Cp_lg" src="./pictures/logo_Icon/TDev_logo.png" alt="" srcset="">
    </header>

    <div class="container">

        <nav class="vertical-nav">
            <button id="Toggle-nav"><img src="./pictures/logo_Icon/Tog.png" alt=""></button>
            <ul id="nav-list">
                <li id="avar"><img src="./pictures/logo_Icon/User_Icon.png" id="pic" alt="">
                    <p style="padding: 0 15px">Hieu Nguyen</p>
                </li>
                <li><a href="#home"><i class="fa fa-chart-line"></i><p>Tổng quan</p></a></li>
                <li><a href="#services"><i class="fa fa-desktop"></i><p>Thiết bị</p></a></li>
                <li><a href="#about"><i class="fa fa-bell"></i><p>Cảnh báo</p></a></li>
                <li><a href="#contact"><i class="fa fa-book"></i><p>Nhật trình</p></a></li>
                <li><a href="#contact"><i class="fas fa-sign-out-alt"></i><p>Đăng xuất</p></a></li>
            </ul>
        </nav>

        <main class="main-content">
            <section>
<div class="Env">
                    <img src="./pictures/logo_Icon/Tab_Lable.png" alt="">
                    <div class="Env_Element">
                        <div class="Env_Element_Container">
                            <img id="Temp_Inside" src="./pictures/logo_Icon/Temp_Inside.png" alt="" srcset="">
                            <div class="Env_Temp">
                                <div class="Lable">Nhiệt độ phòng</div>
                                <div class="Value" id="Temp_Is">0 ℃ </div>
                            </div>
                        </div>
                        <div class="Env_Element_Container">
                            <img id="Temp_Outside" src="./pictures/logo_Icon/Temp_OutSide.png" alt="" srcset="">
                            <div class="Env_Temp">
                                <div class="Lable">Nhiệt độ ngoài trời</div>
                                <div class="Value" id="Temp_Os">0 ℃ </div>
                            </div>
                        </div>
                        <div class="Env_Element_Container">
                            <img src="./pictures/logo_Icon/Humidity.png" alt="" srcset="">
                            <div class="Env_Temp">
                                <div class="Lable">Độ ẩm</div>
                                <div class="Value" id="Hum">0 %</div>
                            </div>
                        </div>
                        <div class="Env_Element_Container">
                            <img src="./pictures/logo_Icon/Floot.png" alt="" srcset="">
                            <div class="Env_Temp">
                                <div class="Lable">Tình trạng ngập</div>
                                <div class="Value" id="Flood">Undifined</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------->
                <!--Device Information-->
                <div class="Dev">
                    <img src="./pictures/logo_Icon/Tab_Lable1.png" alt="">
                    <div class="Dev_Container">
                        <div class="Dev_Container_Ctr">
                            <div class="Sta_ctr_Container">
                                <div class="Sta_Ctr" id="Au_Man_Sta">OFF</div>
                                <div class="Act_Ctr">
                                    <label class="toggle">
                                        <input type="checkbox" id="Au_Man" />
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <img src="./pictures/logo_Icon/Au_Man_Stop.png" id="AM_Img" alt="" width="55px"
                                height="55px" srcset="">
                            <div class="Dev_Lable">Au/Man</div>
                        </div>
                        <div class="Dev_Container_Ctr">
                            <div class="Sta_ctr_Container">
                                <div class="Sta_Ctr" id="Door_Sta">OFF</div>
                                <div class="Act_Ctr">
                                    <label class="toggle">
                                        <input type="checkbox" id="Door" />
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <img src="./pictures/logo_Icon/Door_Close.png" id="Door_Img" alt="" width="55px"
                                height="55px" srcset="">
                            <div class="Dev_Lable">Cửa</div>
                        </div>
                        <div class="Dev_Container_Ctr">
                            <div class="Sta_ctr_Container">
                                <div class="Sta_Ctr" id="Camera_Sta">OFF</div>
                                <div class="Act_Ctr">
                                    <label class="toggle">
                                        <input type="checkbox" id="Camera" />
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <img src="./pictures/logo_Icon/Camera.png" id="Camera_Img" alt="" width="55px" height="55px"
                                srcset="">
                            <div class="Dev_Lable">Camera</div>
                        </div>
                        <div class="Dev_Container_Ctr">
                            <div class="Sta_ctr_Container">
                                <div class="Sta_Ctr" id="Fan_Sta">OFF</div>
                                <div class="Act_Ctr">
                                    <label class="toggle">
                                        <input type="checkbox" id="Fan" />
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <img src="./pictures/logo_Icon/Fan.png" id="Fan_Img" alt="" width="55px" height="55px"
                                srcset="">
                            <div class="Dev_Lable">Quạt</div>
                        </div>
                        <div class="Dev_Container_Ctr">
                            <div class="Sta_ctr_Container">
                                <div class="Sta_Ctr" id="Alarm_Sta">OFF</div>
                                <div class="Act_Ctr">
                                    <label class="toggle">
                                        <input type="checkbox" id="Alarm" />
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <img src="./pictures/logo_Icon/Alarm_Off.png" id="Alarm_Img" alt="" width="55px"
                                height="55px" srcset="">
                            <div class="Dev_Lable">Chuông</div>
                        </div>
                        <div class="Dev_Container_Ctr">
                            <div class="Sta_ctr_Container">
                                <div class="Sta_Ctr" id="Generate_Sta">OFF</div>
                                <div class="Act_Ctr">
                                    <label class="toggle">
                                        <input type="checkbox" id="Generate" />
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <img src="./pictures/logo_Icon/E_Generator.png" id="Generate_Img" alt="" width="55px"
                                height="55px" srcset="">
                            <div class="Dev_Lable">Máy phát</div>
                        </div>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------->
                <!--End Part-->
 <div class="Enr_Air_Container">
                    <div class="PMS_Container">
                        <img src="./pictures/logo_Icon/Tab_Lable3.png" alt="">
                        <div class="PMS_Child">
                            <div class="PMS_Air">
                                <div class="PMS_Air_Sta">
                                    <div class="Sta_ctr_Container">
                                        <div class="Sta_Ctr">ON</div>
                                        <div class="Act_Ctr" id="Au_Man">
                                            <label class="toggle">
                                                <input type="checkbox" />
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="PMS_Air_Value">
                                            <button id="Up">+</button>
                                            <div>
                                                <img src="./pictures/logo_Icon/Air_Bkg.png" alt="">
                                                <div class="value">25 ℃</div>
                                            </div>
                                            <button id="Down">-</button>
                                        </div>
                                        <div class="Dev_Lable">Điều hòa 1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="PMS_Air">
                                <div class="PMS_Air_Sta">
                                    <div class="Sta_ctr_Container">
                                        <div class="Sta_Ctr">ON</div>
                                        <div class="Act_Ctr" id="Au_Man">
                                            <label class="toggle">
                                                <input type="checkbox" />
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="PMS_Air_Value">
                                            <button id="Up">+</button>
                                            <div>
                                                <img src="./pictures/logo_Icon/Air_Bkg.png" alt="">
                                                <div class="value">25 ℃</div>
                                            </div>
                                            <button id="Down">-</button>
                                        </div>
                                        <div class="Dev_Lable">Điều hòa 2</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="PMS_Container">
                        <img src="./pictures/logo_Icon/Tab_Lable4.png" alt="">
                        <div class="Enr_Button">
                            <button>Điện Lưới</button>
                            <button>Máy Phát</button>
                        </div>
                        <div class="chart">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="./process/chart.js"></script>
    <script src="./process/ux.js"></script>
   <script src="./process/mqtt.js"></script> 
   <?php include'sql.php'?>
</body>

</html>
