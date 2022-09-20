<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/nav_style.css') }}">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
</head>

<body>

    <div id="modal">
    </div>

    <div class="particle_position">
        <div id="hoge">
            <nav>
                <div class="logo">
                    <h2>MATSUMOTO<br><span>ELECTRIC</span><span class="logo_sub">松本電気管理事務所</span></h2>
                </div>
                <ul class="nav-links">
                    <li><a href="#sec03" id="section02">事業内容</a></li>
                    <li><a href="#sec04" id="section01">会社概要</a></li>
                    <li><a href="https://xs476833.xsrv.jp/">設備管理システム</a></li>
                    <li><a href="{{ route('contact_form_show') }}" class="btn_1">お問合せ</a></li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </div>
    </div>

    <div class="space_2"></div>


    <div>
        <ul class="slider" style="padding: 0;">
            <li class="parent"><img src="{{ asset('/img/6.jpeg') }}" alt="期間限定 全品半額"><h3 class="slider_logo-6"></h3></li>
            <li class="parent"><img src="{{ asset('/img/7.jpeg') }}" alt="期間限定 全品半額"><h3 class="slider_logo-6"></h3></li>
            <li class="parent"><img src="{{ asset('/img/10.jpeg') }}" alt="期間限定 10,000円OFF"><h3 class="slider_logo-1"></h3></li>
            <li class="parent"><img src="{{ asset('/img/2.jpeg') }}" alt="期間限定 送料無料"><h2 class="slider_logo-2"></h2></li>
            <li class="parent"><img src="{{ asset('/img/3.jpeg') }}" alt="期間限定 全品半額"><h3 class="slider_logo-3"></h3></li>
            <li class="parent"><img src="{{ asset('/img/4.jpeg') }}" alt="期間限定 10,000円OFF"><h3 class="slider_logo-4"></h3></li>
            <li class="parent"><img src="{{ asset('/img/5.jpeg') }}" alt="期間限定 送料無料"><h2 class="slider_logo-5"></h2></li>
        </ul>
    </div>



    <div class="space"></div>








    <div class="large_box">

        <section id="sec01">
            <h3 class="title">松本電気管理事務所について</h3>
            <div class="space"></div>
            <div class="wrap">
                <img src="{{ asset('/img/first.jpg') }}">

                <div class="box">
                        <h5 style="text-align:center;">VISION</h5>
                        <br>
                        <p>社会に欠かせない電気インフラ設備の安全を守ります。松本電気管理事務所はITを駆使した最先端の設備管理を目指します。当社では独自のプログラムで作成した管理システムを導入しています。電気設備管理は松本電気管理事務所にご相談ください。</p>
                </div>
            </div>
        </section>

        <section id="sec02">
            <div class="wrap">

                <div class="box">
                        <h5 style="text-align:center ;">MESSAGE</h5>
                        <br>
                        <p>日常生活に不可欠な電気設備の管理は、昨今ますます社会的に重要な部分を担うこととなっています。FITによる自然エネルギー設備の増加によって、設備を安全に管理するエンジニアの技術力への期待は大きくなっています。松本電気管理事務所ではITによる最先端の保守管理システムを構築し、時代の最先端を切り開く保安管理を目指します。</p>
                </div>

                <img src="{{ asset('/img/12.jpeg') }}">

            </div>
        </section>

        <div class="space_2"></div>

        <section id="sec03">
        <h3 class="title">事業内容</h3>
        <div class="wrap_2">
            <div class="item">
            <img src="{{ asset('/img/13.jpeg') }}"  class="scroll_picture">
            <h5 style="text-align:center ;">SERVICE</h5>
            <p>高圧太陽光設備を専門とする電気設備管理を行います。その他、事務所や工場，ビルなどの高圧電気設備の管理もご相談ください。</p>
            </div>

            <div class="item">
            <img src="{{ asset('/img/colum_imaga_8313_01.jpg') }}"  class="scroll_picture">
            <h5 style="text-align:center ;">BERIEF</h5>
            <p>社会インフラに必要不可欠な電気設備の安全を守ります。通常の電気設備管理に加えて遠隔監視によるITによる最新テクノロジーを導入した保安管理を目指します。今の時代だからこそ実現できる保安管理にご期待ください。</p>
            </div>

            <div class="item">
            <img src="{{ asset('/img/20.jpeg') }}" class="scroll_picture">
            <h5 style="text-align:center ;">STORY</h5>
            <p>東日本大震災によって日本の発電事業は大きな変化を遂げました。太陽光などの再生可能エネルギーの導入が促進され、益々電気管理の必要性が増しています。安全な再生可能エネルギーの導入には、同時に高い技術力による保安管理が求められています。松本電気管理事務所はその期待にお応えします。</p>
            </div>
        </div>

        </section>

        <section id="sec04">
            <h3 class="title">会社概要</h3>

            <div class="company">
                <div class="company_content">
                    <table class="table table-hover">
                        <tr>
                        <th>社名</th>
                        <td>松本電気管理事務所</td>
                        </tr>
                        <tr>
                            <th>代表取締役</th>
                            <td>松本直樹</td>
                        </tr>
                        <tr>
                            <th>所在地</th>
                            <td>広島県尾道市因島三庄町1459-4</td>
                        </tr>
                        <tr>
                        <th>連絡先</th>
                        <td>TEL 090-3745-7158<br>FAX 0845-22-5034</td>
                        </tr>
                        <tr>
                        <th>設立</th>
                        <td>2019年6月1日</td>
                        </tr>
                        <tr>
                        <th>主な取引先</th>
                        <td><a href="http://www.enpukuji.co.jp/">（株）円福寺 </a><br><a href="https://eco-labo.co.jp/">（株）エコラボ</a><br><a href="https://www.muronaka.com/">（有）室中産業</a></td>
                        </tr>
                    </table>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3296.004088733612!2d133.1907382!3d34.299439899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3551aca0e16496ed%3A0xc27d82a407fa47d1!2z44CSNzIyLTIzMjIg5bqD5bO255yM5bC-6YGT5biC5Zug5bO25LiJ5bqE55S677yR77yU77yV77yZ4oiS77yU!5e0!3m2!1sja!2sjp!4v1663250248402!5m2!1sja!2sjp" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
        </div>

        </section>







    </div>

    <div class="space_2"></div>

    <footer>
        <div class="footer">

            <div class="logo" style="width:45%;">
                <h5>MATSUMOTO<br><span>ELECTRIC</span><span class="logo_sub_footer">松本電気管理事務所</span></h5>
            </div>
            <div class="icon_parent">
                <div class="icon" style="width:30%;">

                    <a href="#"><i class="bi bi-twitter" style="color:black;padding-bottom: 5px;"></i></a>
                    <a href="#"><i class="bi bi-facebook" style="color:black;padding-bottom: 5px;"></i></a>
                    <a href="#"><i class="bi bi-instagram" style="color:black;padding-bottom: 5px;"></i></a>

                </div>
            </div>

        </div>
        <p  style="text-align:center;color: white;"><small>Copyright (C) 2022 9ineBB All Rights Reserved.</small></p>


    </footer>



    <!-- particlesファイル -->
    <script src="{{ asset('/js/particles.js') }}"></script>
    <script src="{{ asset('/js/setting.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('.slider').slick({
            autoplay: true,
            autoplaySpeed: 4000,
            speed: 1500,
            dots: true,
            arrows: true,
            infinite: true,
            pauseOnHover: false,
            /*----両サイドを表示----*/
            centerMode:true,
            centerPadding:"10%",
            /*----------------------*/
        });
    </script>

    <script src="{{ asset('/js/nav_script.js') }}"></script>

</body>

</html>
