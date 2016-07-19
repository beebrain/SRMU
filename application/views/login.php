
<?php 
$link_main = site_url() . 'main';
?> 
	<div id="main">
		<div class="full_w" >
				<img src=<?php print base_url()?>assets/img/login-head.jpg />
				<br>
				
				<?php echo form_open('checkLogin'); ?>
				<?php echo $this->session->flashdata('msg'); ?> 
					<label for="login">ชื่อผู้ใช้ :</label>
					<input  id="login" name="username" autocomplete="off"  size=50 />
					 <?php echo form_error('username'); ?>
					<label for="pass">รหัสผ่าน :</label>
					<input id="pass" name="password" type="password" size=50 autocomplete="off"  />
					 <?php echo form_error('password'); ?>

	
					<div class="sep"></div>
					<button type="submit" id="ok" >เข้าสู่ระบบการใช้งาน</button>
					<a id="cancel" class="button" href="<?php echo $link_main; ?>">ยกเลิก</a>
</div>
				<?php print form_close();?>
                
			</div>
		
	

			</div>

			
