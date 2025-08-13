<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://codeigniter4.github.io/shield/quick_start_guide/using_authorization/#change-available-groups for more info
     */
    public array $groups = [
        'superadmin' => [
            'title'       => 'Суперадминистраторы',//'Super Admin',
            'description' => 'Группа обладающая полным контролем над сайтом.',
        ],
        'admin' => [
            'title'       => 'Администраторы',
            'description' => 'Грпуппа обладающая правом доступа к админ-панели',
        ],
        'moderator' => [
            'title'       => 'Модераторы',
            'description' => 'Группа модераторов контента',
        ],
        'uploader' => [
            'title'       => 'Uploader',
            'description' => 'Обычные пользователи с правами на создание содержимого',
        ],
        'user' => [
            'title'       => 'Пользователи',
            'description' => 'Обычные пользователи сайта',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'        => 'Может получить доступ к административной части сайта',
        'admin.settings'      => 'Может получить доступ к основным настройкам сайта',
        'users.manage-admins' => 'Может управлять другими администраторами',
				'users.manage-sadm'   => 'Может управлять другими суперадминистраторами',
        'users.create'        => 'Может создавать новых пользователей без прав администратора',
        'users.edit'          => 'Может редактировать существующих пользователей, не являющихся администраторами',
        'users.delete'        => 'Можно удалять существующих пользователей, не являющихся администраторами',
        'tor.upload'          => 'Может загружать торренты и создавать раздачи на сайте',
        'tor.download'        => 'Может скачивать торренты и видит magnet-ссылки',
				'tor.comment'				  => 'Может комментировать содержимое',
				'tor.edit'			  		=> 'Может редактировать любой контент',
				'tor.ownededit'		  	=> 'Может редактировать собственный контент',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'users.*',
            'tor.*',
        		'comment.*',
        ],
        'admin' => [
            'admin.access',
            'users.create',
            'users.edit',
            'users.delete',
            'tor.*',
        		'comment.*',
        ],
        'moderator' => [
            'tor.*',
        		'comment.*',
        ],
        'uploader' => [
        		'tor.upload',
        		'tor.ownededit',
        		'tor.comment',
        		'tor.download',
        		'comment.add',
        		'comment.ownededit',
        		'comment.owneddelete',
        ],
        'user' => [
						'tor.download',
        		'comment.add',
        		'comment.ownededit',
        		'comment.owneddelete',
//        		'tor.upload',
//        		'tor.ownededit',
//        		'tor.comment',
        ],
    ];
}
