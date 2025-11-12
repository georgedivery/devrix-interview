<article class="blog-post">
	<h2 class="blog-post-title">
		<?php the_title(); ?> 
	</h2>

	<div class="article-body">
		<p class="blog-post-meta">
			<span>
				<?php the_date(); ?> by
			</span> 

			 <a href="#">
				<?php the_author(); ?>
			</a>
		</p>
 		
 		<?php the_content(); ?>
	</div>
</article>