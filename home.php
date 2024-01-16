<?php include 'db_connect.php'?>

<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    top: 0;
}

.col-md-12::{

}
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}
	.vid-item{
		cursor: pointer;
		position: relative;
	}
	.watch{
		position: absolute;
		top: 0;
		left: 0;
		height: calc(100%);
		width: calc(100%);
		opacity: 0;
	    background: #00000052;
	}
	.vid-item:hover .watch{
		opacity: 1;
	}
</style>
<div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row d-flex" style="justify-content:center;flex-wrap:wrap;">
							<?php
								

								$where = '';
								if(isset($_GET['s'])){
									$search = strtolower($_GET['s']);
									$where = " where LOWER(title) LIKE '%$search%' or LOWER(description) LIKE '%$search%' ";
								}
								$qry = $conn->query("SELECT * FROM uploads $where order by rand()");
								if($qry->num_rows > 0):
								while($row=$qry->fetch_assoc()):
									$id = $row['user_id'];
									$avatar = mysqli_query($conn,'SELECT avatar FROM users WHERE id = '.$id.'');
									$first = mysqli_query($conn,'SELECT firstname FROM users WHERE id = '.$id.'');
									$second = mysqli_query($conn,'SELECT lastname FROM users WHERE id = '.$id.'');

							?>
							<div class="col-md-3 py-2">
								<div class="card bg-dark" style="border:solid 0.8px #c2c3c4;width:300px;min-height:200px;max-height:400px;">
								  <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
								  <a class="card-img-top d-flex justify-content-center bg-dark border-dark img-thumbnail w-100 p-0 vid-item" href="index.php?page=watch&code=<?php echo $row['code'] ?>">
									<video style="max-height: 200px; max-width: 100%;" id="<?php echo $row['code'] ?>" class="img-fluid" <?php echo !empty($row['thumbnail_path']) ? "poster='assets/uploads/thumbnail/".$row['thumbnail_path']."'" : '' ?> muted>
										<source src="<?php echo !empty($row['video_path']) ? "assets/uploads/videos/".$row['video_path'] : '' ?>">
									</video>
									<div class="watch d-flex align-items-center justify-content-center"><h3><span class="fa fa-play text-white"></span></h3></div>
								</a>
								  <div class="card-body bg-light text-dark">
								<div class="d-flex align-items-center" style="align-items:center;margin-left: -10px;margin-top: -10px;margin-bottom: -10px;">
								
								<h6 class="card-title cbv" style="margin-left: 10px;margin-top: 10px;"><?php echo ucwords($row['title']) ?></h6>
								</div>
					
								<br>
								<span class="badge badge-white" style="color:grey;margin-left:25px;top:-10px;font-size:12px;">
									
								<?php echo $row['total_views'].($row['total_views'] > 1 ? ' views':' view')?>
									
								</span>
								<span class="badge badge-white" style="color:grey;top:-10px;font-size:12px;">
									
								<?php
								$date = date("M d, Y",strtotime($row['date_created']));
								
								echo $date;
								
								?>
									
								</span>
								
							</div>
								</div>
							</div>
							<?php endwhile; ?>
							<?php else: ?>
								<center><b><h6>No video or clip to display.</h6></b></center>
							<?php endif; ?>
						</div>
                    </div>
            </div>      			
        </div>
    </div>
</div>

<script>
	$('#upload').click(function(){
		uni_modal("<i class='fa fa-video'></i> Upload Video","upload.php","large")
	})
	$('.vid-item').click(function(){
		location.href = "index.php?page=watch&code="+$(this).attr('data-id')
	})
	$('.vid-item').hover(function(){
		var vid = $(this).find('video')
		var id = vid.get(0).id;
			setTimeout(function(){
				vid.trigger('play')
				document.getElementById(id).playbackRate = 2.0
			},500)
	})
	$('.vid-item').mouseout(function(){
		var vid = $(this).find('video')
			setTimeout(function(){
				vid.trigger('pause')
			},500)
	})
</script>

<style>
	.cbv{
		overflow:hidden;
		display:-webkit-box;
		-webkit-line-clamp:1;
		line-clamp:1;
		-webkit-box-orient:vertical;
	}
</style>
