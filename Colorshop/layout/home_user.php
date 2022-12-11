<?php include 'layout/header_user.php' ?>

    <div class="fs_menu_overlay"></div>
   
    <!-- Slider -->

    <div class="main_slider" style="background-image:url(images/slider_1.jpg)">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6>Spring / Summer Collection 2017</h6>
                        <h1>Get up to 30% Off New Arrivals</h1>
                        <div class="red_button shop_now_button"><a href="index.php?art=categories">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                                data-filter="*">all</li>
                            <?php foreach ($list_dm as $row) {
                             ?>

                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" 
                                data-filter=".<?php echo $row['name'] ?>"><?php echo $row['name'] ?></li>

                             <?php   }  ?>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid"
                        data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        <!-- Product 1 -->
                        <?php foreach ($list_sp as  $sp) {
                        ?>
                            <div class="product-item <?= $sp['name'] ?>">
                                <div class="product discount product_filter">
                                    <a href="index.php?art=single&id_sp=<?php echo $sp['id_sp'] ?>">
                                        <div class="product_image">
                                            <img src="<?php echo "../uploaded_img/".$sp['img']  ?>" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <!-- <div
                                            class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                            <span>-$20</span></div> -->
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="index.php?art=single&id_sp=<?php echo $sp['id_sp'] ?>"><?php echo $sp['name'] ?></a></h6>
                                            <div class="product_price">$<?php echo $sp['price']  ?></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="index.php?art=single&id_sp=<?php echo $sp['id_sp'] ?>">Xem chi tiết</a></div>
                            </div>

                        <?php } ?>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deal of the week -->

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="images/deal_ofthe_week.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="categories.html">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Best Sellers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product_slider_container">
                        
                        <div class="owl-carousel owl-theme product_slider">

                            <!-- Slide 1 -->
                            <?php foreach ($list_sp as $key => $row) {
                                ?>
                        
                                <div class="owl-item product_slider_item">
                                    <a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>">
                                        <div class="product-item">
                                            <div class="product discount">
                                                <div class="product_image">
                                                    <img src="<?php echo "../uploaded_img/".$row['img'] ?>" alt="">
                                                </div>
                                                <div class="favorite favorite_left"></div>
                                                <div class="product_info">
                                                    <h6 class="product_name"><a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['name'] ?></a></h6>
                                                    <div class="product_price">$<?php echo $row['price'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>  
                                </div>
                            <?php }  ?>
                            
                          
                        </div>    
                        <!-- Slider Navigation -->

                        <div
                            class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div
                            class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>45 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blogs -->

    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row blogs_container">
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_1.jpg)"></div>
                        <div
                            class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_2.jpg)"></div>
                        <div
                            class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_3.jpg)"></div>
                        <div
                            class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

   
<?php include 'layout/footer_user.php' ?>
