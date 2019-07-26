<?php $inbox = 0;
	$sent = 0;
	$draft = 0;
	$trash = 0;
	$message_count = $this->message_model->get_message_count();
	if(isset($message_count['inbox']) && $message_count['inbox'] !='')
	{
		$inbox = $message_count['inbox'];
	}
	if(isset($message_count['sent']) && $message_count['sent'] !='')
	{
		$sent = $message_count['sent'];
	}
	if(isset($message_count['draft']) && $message_count['draft'] !='')
	{
		$draft = $message_count['draft'];
	}
	if(isset($message_count['trash']) && $message_count['trash'] !='')
	{
		$trash = $message_count['trash'];
	}
?>
<div class="xxl-4 xl-4 s-16 m-16 l-4 xs-16 ne_inbox_left_pan padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-xs">
    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero">
        <a href="<?php echo $base_url; ?>message/compose" class="btn-compose-new-msg xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-cursor">
            <i class="fa fa-plus ne_mrg_ri8_10"></i>Compose New
		</a>
	</div>
    <ul class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-border margin-top-10px padding-lr-zero border-top hidden-sm hidden-xs">
        <li class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero" onClick="message_system_st('inbox')">
            <a href="javascript:;" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 <?php if($message_type == 'inbox'){ echo 'active';} ?>">
                <div class="bold xxl-10 xl-10 s-10 m-10 xs-12 l-12 ne_font_14 ne_pad_tp_3px">
                    <i class="fa fa-inbox ne_mrg_ri8_10"></i>Inbox
				</div>
                <div class="xxl-6 xl-6 s-6 m-6 xs-4 l-4">
                    <span class="ne-counter pull-right text-bold"><?php echo $inbox; ?></span>
				</div>
			</a>
		</li>
        <li class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero" onClick="message_system_st('sent')">
            <a href="javascript:;" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 <?php if($message_type == 'sent'){ echo 'active';} ?> ">
                <div class="bold xxl-10 xl-10 s-10 m-10 xs-12 l-12 ne_font_14 ne_pad_tp_3px">
                    <i class="fa fa-paper-plane ne_mrg_ri8_10"></i>Sent
				</div>
                <div class="xxl-6 xl-6 s-6 m-6 xs-4 l-4">
                    <span class="ne-counter pull-right  text-bold"><?php echo $sent; ?></span>
				</div>
			</a>
		</li>
        <li class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero" onClick="message_system_st('draft')">
            <a href="javascript:;" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 <?php if($message_type == 'draft'){ echo 'active';} ?> ">
                <div class="bold xxl-10 xl-10 s-10 m-10 xs-12 l-12 ne_font_14 ne_pad_tp_3px">
                    <i class="fa fa-envelope ne_mrg_ri8_10"></i>Draft
				</div>
                <div class="xxl-6 xl-6 s-6 m-6 xs-4 l-4">
                    <span class="ne-counter pull-right text-bold "><?php echo $draft; ?></span>
				</div>
			</a>
		</li>
        <li class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero" onClick="message_system_st('trash')">
            <a href="javascript:;" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 <?php if($message_type == 'trash'){ echo 'active';} ?> ">
                <div class="bold xxl-10 xl-10 s-10 m-10 xs-12 l-12 ne_font_14 ne_pad_tp_3px">
                    <i class="fa fa-trash-o ne_mrg_ri8_10"></i>Trash
				</div>
                <div class="xxl-6 xl-6 s-6 m-6 xs-4 l-4">
                    <span class="ne-counter pull-right text-bold "><?php echo $trash; ?></span>
				</div>
			</a>
		</li>
	</ul>
	
	<!-- =========   Mobile Site  ======== -->
	<div class="hidden-lg hidden-md">
		<br>
		<button class="btn" data-toggle="collapse" data-target="#demo" style="margin-top:40px;
		width: 100%;
		font-size: 16px;
		text-transform: capitalize;
		font-weight: normal;margin-bottom:10px;"> Message <i class="fa fa-caret-down pull-right"></i> </button>
		<div id="demo" class="collapse">
			<ul class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-border margin-top-10px padding-lr-zero border-top">
				<li class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero" onClick="message_system_st('inbox')">
					<a href="javascript:;" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 <?php if($message_type == 'inbox'){ echo 'active';} ?>">
						<div class="bold xxl-10 xl-10 s-10 m-10 xs-12 l-12 ne_font_14 ne_pad_tp_3px">
							<i class="fa fa-inbox ne_mrg_ri8_10"></i>Inbox
						</div>
						<div class="xxl-6 xl-6 s-6 m-6 xs-4 l-4">
							<span class="ne-counter pull-right text-bold"><?php echo $inbox; ?></span>
						</div>
					</a>
				</li>
				<li class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero" onClick="message_system_st('sent')">
					<a href="javascript:;" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 <?php if($message_type == 'sent'){ echo 'active';} ?> ">
						<div class="bold xxl-10 xl-10 s-10 m-10 xs-12 l-12 ne_font_14 ne_pad_tp_3px">
							<i class="fa fa-paper-plane ne_mrg_ri8_10"></i>Sent
						</div>
						<div class="xxl-6 xl-6 s-6 m-6 xs-4 l-4">
							<span class="ne-counter pull-right  text-bold"><?php echo $sent; ?></span>
						</div>
					</a>
				</li>
				<li class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero" onClick="message_system_st('draft')">
					<a href="javascript:;" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 <?php if($message_type == 'draft'){ echo 'active';} ?> ">
						<div class="bold xxl-10 xl-10 s-10 m-10 xs-12 l-12 ne_font_14 ne_pad_tp_3px">
							<i class="fa fa-envelope ne_mrg_ri8_10"></i>Draft
						</div>
						<div class="xxl-6 xl-6 s-6 m-6 xs-4 l-4">
							<span class="ne-counter pull-right text-bold "><?php echo $draft; ?></span>
						</div>
					</a>
				</li>
				<li class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero" onClick="message_system_st('trash')">
					<a href="javascript:;" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 <?php if($message_type == 'trash'){ echo 'active';} ?> ">
						<div class="bold xxl-10 xl-10 s-10 m-10 xs-12 l-12 ne_font_14 ne_pad_tp_3px">
							<i class="fa fa-trash-o ne_mrg_ri8_10"></i>Trash
						</div>
						<div class="xxl-6 xl-6 s-6 m-6 xs-4 l-4">
							<span class="ne-counter pull-right text-bold "><?php echo $trash; ?></span>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- =========   Mobile Site  ======== -->
	
	
	
	
    <div class="clearfix"></div>
</div>