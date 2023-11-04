<?php

    // Create connection to db
    include('config\db_connect.php');

    // Write the query
    $sql = 'SELECT * FROM pizzas ORDER BY created_at';

    // Insert the query to db connection
    $result = mysqli_query($conn, $sql);

    // Fetch data as array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result from memory
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

    //explode(',', $pizzas[0]['ingredients']);

?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates\header.php') ?>

    <main>
        <div class="relative">
            <div class="hero" style="height: 60vh; overflow: hidden;">
                <div class="carousel w-full">
                    <div id="slide1" class="carousel-item relative w-full bg-cover">
                        <img src="public\img\hero1.jpg" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide4" class="btn btn-circle">❮</a> 
                        <a href="#slide2" class="btn btn-circle">❯</a>
                        </div>
                    </div> 
                    <div id="slide2" class="carousel-item relative w-full">
                        <img src="public\img\hero2.jpg" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide1" class="btn btn-circle">❮</a> 
                        <a href="#slide3" class="btn btn-circle">❯</a>
                        </div>
                    </div> 
                    <div id="slide3" class="carousel-item relative w-full">
                        <img src="public\img\hero3.jpg" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide2" class="btn btn-circle">❮</a> 
                        <a href="#slide4" class="btn btn-circle">❯</a>
                        </div>
                    </div> 
                    <div id="slide4" class="carousel-item relative w-full">
                        <img src="public\img\hero4.jpg" class="w-full bg-contain" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide3" class="btn btn-circle">❮</a> 
                        <a href="#slide1" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute top-0 w-[450px] ms-24 mt-16">
                <h1 class="text-[60px] font-display text-white font-bold">Enjoy Your Fresh Pizza Today</h1>
                <div class="btn rounded-full w-[150px] bg-warning text-white mt-8"><a href="#">Order Now</a></div>
            </div>
        </div>
        <div >
            <div class="grid grid-cols-2 gap-10 px-32 py-24">
                <div class="relative">
                    <img class="rounded-2xl" src="public\img\sub1.jpg" alt="" style="transform: scaleX(-1)">
                    <div class="absolute top-[-45px] left-[200px] w-[300px] ms-24 mt-16">
                        <h1 class="text-[40px] font-display text-white font-bold">Enjoy Your Fresh Pizza Today</h1>
                        <div class="btn rounded-full w-[150px] bg-warning text-white mt-8"><a href="#">Order Now</a></div>
                    </div>
                </div>
                <div class="relative">
                    <img class="rounded-2xl" src="public\img\sub2.jpg" alt="">
                    <div class="absolute top-[-45px] left-[200px] w-[300px] ms-24 mt-16">
                        <h1 class="text-[40px] font-display text-white font-bold">Enjoy Your Fresh Pizza Today</h1>
                        <div class="btn rounded-full w-[150px] bg-warning text-white mt-8"><a href="#">Order Now</a></div>
                    </div>
                </div>
            </div>
            <div>
                
            </div>
        </div>
    </main>

    <?php include('templates\footer.php') ?>
    
</html>