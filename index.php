<?php
    include_once 'includedBuilts/header.php';
?>
        <br>
        <section class="SlideShow-Block">
        <?php
                include_once 'includedBuilts/slideShow.php';
            ?>
        </section>
        <section class="LatestProduct-Block">
            <?php
                include_once 'includedBuilts/latestProducts.php';
            ?>
        </section>
        <section class="AboutUs-Block">
            <h1>About us</h1>
            <p><a>In</a><a> fact</a><a> there</a><a> is</a><a> no</a><a> us.</a><a> Yeah.</a><a> Sorry</a><a> for</a><a> letting</a><a> you</a><a> down.</a><a> This</a><a> is</a><a> what</a><a> is</a><a> supposed</a><a> to</a><a> be</a><a> an</a><a> about</a><a> us.</a><a>
                 For</a><a> us.</a><a> So,</a><a> this</a><a> website</a><a> is</a><a> for</a><a> a</a><a> project</a><a> purposes,</a><a> not</a><a> a</a><a> real</a><a> shop.</a><a>
                      I</a><a> need</a><a> to</a><a> make</a><a> this</a><a> text</a><a> look</a><a> a</a><a> little </a><a>more</a><a> bigger</a><a> so</a><a> i</a><a> will</a><a> also</a><a> add</a><a> this</a><a> line.</a></P>
        </section>
        <hr>
        <section class="GoogleMaps-Block">
            <center>
                <h1>Our Location</h1>
                <div class="GoogleMaps">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Aul%20deckwaneh&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <br>
                            <a href="https://www.embedgooglemap.net"></a>
                            </div>
                        </div>
                    </div>
            </center>
        </section>
        <script>
            showSlides(slideIndex);
          </script>
    </body>
</html>