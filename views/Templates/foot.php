<footer>
        <div class="grid">
            <div class="top">
                <h1>Perpuss</h1>
                <div class="menu">
                </div>
                <div class="info">
                    <p>Chandra</p>
                </div>
            </div>
            <div class="bottom">
                &copy; Copyright | 2023 - Allright Reserve
            </div>
        </div>
    </footer></div>
    <script>
        $('#menu-toggle').click(function(){
            $(this).toggleClass('open');
            if ($(this).hasClass('open')) {
                $('.float').addClass('active');
                $('.menu-mobile').addClass('active');
            } else {
                $('.float').removeClass('active');
                $('.menu-mobile').removeClass('active');
            }
        });
    </script>
    </body>
    <link href="../../assets/css/stylenew.css" rel="stylesheet" type="text/css";>
</html>