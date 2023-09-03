<div class="header">
    <div class="appname"><a href="<?php echo SLI_PAGE_LANDING; ?>"><?php echo SLI_TYPEFACE; ?></a></div>
    <div class="menu">
        <div class="support" id="support">
            <div class="cancel">
                <span class="version"><?php echo SLI_VERSION; ?></span>
                <span class="support-icon" title="Cancel" onClick="BLN_DISPLAY_DOM('support','CLOSE')">&times;</span>
            </div>	
            <div class="title">Welcome to <?php echo SLI_TYPEFACE; ?></div>    
            <div class="message">
                For complaints and technical support, contact :
                 <?php echo SLI_CONTACT; ?>
            </div>         
        </div>     
        <div class="menu-icon">
            <a href="<?php echo WEBMAIL; ?>">
            	<img src="../../Media/Icon/Email.png" id="webmail" alt="Webmail" title="Visit Webmail" />
            </a>
            <a href="#">            
	            <img src="../../Media/Icon/Doc.png" id="help" alt="Help" title="Read Software Manual" />
            </a>
            <img src="../../Media/Icon/Settings.png" id="support" alt="Support" title="Contact Tech Support" onClick="BLN_DISPLAY_DOM('support','OPEN')" />
        </div>               
    </div>  
</div>

<?php if (_PAGE != 'Login') echo JSP_SPRY_DRAWER('LEFT'); ?>
    