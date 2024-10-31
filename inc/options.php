<?php
	global $oiiioscrollup_options;
	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; ?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>scroll up</h2>
	<?php if ( false !== $_REQUEST['updated'] ) : ?>
        <div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
    <?php endif; ?>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3><span>scroll up settings</span></h3>
						<div class="inside">
                            <form method="post" action="options.php">
								<?php $settings = get_option( 'oiiioscrollup_options', $oiiioscrollup_options ); ?>
                                <?php settings_fields( 'scroll_p_options' ); ?>
                                <table class="form-table">
                                    <tr valign="top">
                                        <td scope="row"><label for="speed">speed</label></td>
                                        <td><input id="speed" type="text" name="oiiioscrollup_options[speed]" value="<?php echo stripslashes($settings['speed']); ?>" class="my-color-field" />
                                        <p class="description"><code> default speed 1000 </code></p>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                        <td scope="row"><label for="theme">theme</label></td>
                                        <td><input id="theme" type="text" name="oiiioscrollup_options[theme]" value="<?php echo stripslashes($settings['theme']); ?>" class="my-color-field" />
                                        <p class="description"><code> default, cycle, square, text or triangle </code></p>
                                        </td>
                                    </tr>
                                </table>
                                <p><input class="button-primary" type="submit" name="Example" value="save" /> </p>
                            </form>
                            <h1 align="center">Available Theme</h1>
                            <p align="center"><img src="<?php echo plugins_url('scroll-up-oiiio/img/style.png'); ?>" /></p>
						</div>
					</div>
				</div>
			</div>
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox">
						<h3><span>Author</span></h3>
						<div class="inside">
							<p><a href="http://oiiio.us/plugins/scroll-up-oiiio/" target="_blank">view plugin documentations</a></p>
                            <p><a href="http://oiiio.us/plugins/" target="_blank">view author's all plugins</a></p>
                            <p><a href="http://oiiio.us/themes/" target="_blank">view author's all themes</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br class="clear">
	</div>
</div>