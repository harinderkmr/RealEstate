<?php
    /**
     * Template Name: spasticity
     */
    get_header();
?>
<section class="sec content small-container services-page">
    <div class="container-sm container-xs">
                <?= get_field('page_heading'); ?> 
                <!-- Page Repeater  -->
                <?php  if(have_rows('spasticity_questions')):
                        while( have_rows( 'spasticity_questions' ) ): the_row();?>
                            <div class="ques-container mb-4 ">
                                 <?php echo get_sub_field('question'); ?> 
                                 <?php echo get_sub_field('answer'); ?> 
                            </div>  
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div data-mesh-id="comp-lod7w3171inlineContent"  data-testid="inline-content" class="no-goal-block mb-3">
                        <div data-mesh-id="comp-lod7w3171inlineContent-gridContainer" data-testid="mesh-container-content" style="height: 100%; width:100%">
                            <div id="comp-lnkikqe3" style="height: 100%; width:100%" class="OQ8Tzd comp-lnkikqe3"><iframe class="nKphmK" title="PDF File Viewer" aria-label="PDF File Viewer" scrolling="no" style="height: 100%; width:100%"
                                 src="https://wixlabs-pdf-dev.appspot.com/index?pageId=walzz&amp;compId=comp-lnkikqe3&amp;viewerCompId=comp-lnkikqe3&amp;siteRevision=1612&amp;viewMode=site&amp;deviceType=desktop&amp;locale=en&amp;tz=America%2FToronto&amp;regionalLanguage=en&amp;width=956&amp;height=526&amp;instance=cYLch-aocpOHJgx_jaxi9M4wd1TmTW-NXxW5aGNaAss.eyJpbnN0YW5jZUlkIjoiYjFhZjZmYmQtZDkyMi00YThhLWIzODEtMTI3N2NmYTQxZjliIiwiYXBwRGVmSWQiOiIxM2VlMTBhMy1lY2I5LTdlZmYtNDI5OC1kMmY5ZjM0YWNmMGQiLCJtZXRhU2l0ZUlkIjoiNTNjNWYxYjgtODNlZS00YjEyLWJhZDgtYjQwYjczZjFlZjk5Iiwic2lnbkRhdGUiOiIyMDI0LTAxLTA5VDExOjQ0OjU0LjIyNFoiLCJkZW1vTW9kZSI6ZmFsc2UsImFpZCI6ImFmMWYzMDI5LWQ4YTAtNGQ4OS1hN2Q4LTFkZGZmZDcxMTVjYSIsImJpVG9rZW4iOiJlMjZhOWUwNS01YWNjLTAxOTgtMDk1OS1hNjdjYmM1NWYwMDIiLCJzaXRlT3duZXJJZCI6IjJjYjUzNTE5LWQwNzYtNDM1Yi05NmFhLTk3ZjNjMmU3ZmQwNiJ9&amp;currency=CAD&amp;currentCurrency=CAD&amp;commonConfig=%7B%22brand%22%3A%22wix%22%2C%22host%22%3A%22VIEWER%22%2C%22bsi%22%3A%2264ee3ae3-fff6-4847-b307-270b33e1d88d%7C5%22%2C%22BSI%22%3A%2264ee3ae3-fff6-4847-b307-270b33e1d88d%7C5%22%7D&amp;currentRoute=.%2Fspasticity&amp;vsi=c2f670b8-ffd4-4614-a0af-8dddc808477f" 
                                 allowfullscreen="true" allowtransparency="true" allowvr="true" frameborder="0" allow="autoplay;camera;microphone;geolocation;vr"></iframe>
                            </div>
                        </div>
                    </div>
                        <?= get_field('spasticity_information'); ?> 
                    <?php  if(have_rows('spasticity_info_repearter')):
                        while( have_rows( 'spasticity_info_repearter' ) ): the_row();?>
                            <div class="ques-container">
                                <?php $link = get_sub_field('info_link'); ?>
                                <a class="px-4 pb-3" href="<?php echo esc_url($link['url']); ?>"> <?php echo esc_html($link['title']); ?> </a> 
                            </div>  
                        <?php endwhile; ?>
                    <?php endif; ?>      
        </div>
    </div>
</section>
<?php  get_footer(); ?>