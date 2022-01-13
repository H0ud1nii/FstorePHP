<div class="slideshow-container">

                <?php

                $slideShow=getSlideShowImg();

                while ($row=mysqli_fetch_assoc($slideShow)){
                    ?>

                        <div class="mySlides fade">
                            <img src="img/slideshowImage<?php echo $row['img'] ?>.jpg" style="width: 100%">
                        </div>

                    <?php
                }
                ?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <div style="text-align: center">
            <?php
            $slideShow=getSlideShowImg();
            while ($row=mysqli_fetch_assoc($slideShow)){
                ?>
                    <span class="dot" onclick="currentSlide(<?php echo $row['img_id'] ?>)"></span>
                <?php
            }
            ?>
            </div>