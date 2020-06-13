<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo __('User listing',' wp-test'); ?></h1>

    <table id="myTable" class="wp-list-table widefat fixed striped pages" style="width:100%">
        <thead>
            <tr>
                <th style="width:25px"><?php echo __('ID','wp-test'); ?></th>
                <th><?php echo __('Name','wp-test'); ?></th>
                <th><?php echo __('Username','wp-test'); ?></th>
                <th><?php echo __('Email','wp-test'); ?></th>
                <th><?php echo __('Website','wp-test'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user){ ?>
            <tr>
                <td>
                    <a href="javascript:void(0)" dataid="<?php echo $user->id;?>" class="view-user">
                        <?php echo __($user->id,'wp-test'); ?>
                    </a>
                </td>
                <td>
                    <a href="javascript:void(0)" dataid="<?php echo $user->id;?>" class="view-user">
                        <?php echo __($user->name,'wp-test'); ?>
                    </a>
                </td>
                <td>
                    <a href="javascript:void(0)" dataid="<?php echo $user->id;?>" class="view-user">
                        <?php echo __($user->username,'wp-test'); ?>
                    </a>
                </td>
                <td><?php echo __($user->email,'wp-test'); ?></td>
                <td>
                    <a href="https://<?php echo $user->website; ?>" target="_blank">
                        <?php echo __($user->website,'wp-test'); ?>
                    </a>
                </td>
            </tr>
    <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo __('ID','wp-test'); ?></th>
                <th><?php echo __('Name','wp-test'); ?></th>
                <th><?php echo __('Username','wp-test'); ?></th>
                <th><?php echo __('Email','wp-test'); ?></th>
                <th><?php echo __('Website','wp-test'); ?></th>
            </tr>
        </tfoot>
    </table>
    <div id="overlay"></div>
    <div class="loader" style="display:none">
        <img src="<?php echo plugin_dir_url(__FILE__); ?>../../imgs/loader.gif">
    </div>

</div><!--/wrap-->