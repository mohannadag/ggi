


<div class="py-[50px] lg:py-[50px]">
<div id="stories" class="storiesWrapper"></div>
</div>


<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('frontend/js/plugins/zuck.min.js')); ?>"></script>

<script>
    var currentSkin = getCurrentSkin();
    var stories = new Zuck('stories', {
      backNative: true,
      previousTap: true,
      skin: currentSkin['name'],
      autoFullScreen: currentSkin['params']['autoFullScreen'],
      avatars: currentSkin['params']['avatars'],
      paginationArrows: currentSkin['params']['paginationArrows'],
      list: currentSkin['params']['list'],
      cubeEffect: currentSkin['params']['cubeEffect'],
      localStorage: true,
      stories: [
        <?php $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $createdAt = \Carbon\Carbon::parse($story->created_at);
        ?>
        Zuck.buildTimelineItem(
          "<?php echo e($story->storyTranslation->title); ?>",
          "<?php echo e(URL::asset('images/stories/' . $story->file)); ?>",
          "<?php echo e($story->storyTranslation->title); ?>",
          "https://ggiturkey.com",
          timestamp(),
          [
            ["<?php echo e($story->storyTranslation->title); ?>", "<?php echo e($story->type); ?>", "<?php echo e($story->duration); ?>", "<?php echo e(URL::asset('images/stories/' . $story->file)); ?>", "<?php echo e(URL::asset('images/stories/' . $story->file_thumb)); ?>", '<?php echo e(url($story->link)); ?>', '<?php echo e($story->storyTranslation->link_title); ?>', false, timestamp()],
          ]
        ),
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      ]
    });
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/includes/stories.blade.php ENDPATH**/ ?>