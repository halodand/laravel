<?php

return [
    'userManagement'    => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission'        => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'              => [
        'title'          => 'مجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'              => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'team'                     => 'Team',
            'team_helper'              => '',
        ],
    ],
    'team'              => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'name'              => 'Name',
            'name_helper'       => '',
        ],
    ],
    'currency'          => [
        'title'          => 'Currency',
        'title_singular' => 'Currency',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'img_page'             => 'Image',
            'img_page_helper'      => '',
            'nama'                 => 'Nama',
            'nama_helper'          => 'nama currency/broker',
            'jual'                 => 'Harga Jual',
            'jual_helper'          => '',
            'beli'                 => 'Kurs Beli',
            'beli_helper'          => '',
            'diskon'               => 'Diskon',
            'diskon_helper'        => '',
            'no_currency'          => 'No Currency',
            'no_currency_helper'   => 'Nomor akun/akun broker anda',
            'nama_currency'        => 'Nama Currency',
            'nama_currency_helper' => 'nama broker/account currency',
            'min_trans'            => 'Minimal Transaksi',
            'min_trans_helper'     => '',
            'max_trans'            => 'Maksimal Transaksi',
            'max_trans_helper'     => '',
            'status'               => 'Status',
            'status_helper'        => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => '',
            'team'                 => 'Team',
            'team_helper'          => '',
            'jenis'                => 'Jenis',
            'jenis_helper'         => '',
        ],
    ],
    'adminMenu'         => [
        'title'          => 'Admin Menu',
        'title_singular' => 'Admin Menu',
    ],
    'broker'            => [
        'title'          => 'Broker',
        'title_singular' => 'Broker',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'judul_kat'                 => 'Nama Kategori Broker',
            'judul_kat_helper'          => '',
            'judul_perusahaan'          => 'Nama Perusahaan',
            'judul_perusahaan_helper'   => '',
            'kantor_pusat'              => 'Kantor Pusat',
            'kantor_pusat_helper'       => '',
            'tahun_berdiri'             => 'Tahun Berdiri',
            'tahun_berdiri_helper'      => '',
            'badan_regulasi'            => 'Badan Regulasi',
            'badan_regulasi_helper'     => '',
            'website'                   => 'Website',
            'website_helper'            => '',
            'profil'                    => 'Deskripsi Profil',
            'profil_helper'             => '',
            'jenis_akun'                => 'Jenis Akun',
            'jenis_akun_helper'         => '',
            'deskripsi_tambahan'        => 'Deskripsi Tambahan',
            'deskripsi_tambahan_helper' => '',
            'kondisi_trading'           => 'Kondisi Trading',
            'kondisi_trading_helper'    => '',
            'ket_broker'                => 'Ket Broker',
            'ket_broker_helper'         => '',
            'rebate_auto_manual'        => 'Rebate Auto Manual',
            'rebate_auto_manual_helper' => '',
            'link_broker'               => 'Link Broker',
            'link_broker_helper'        => '',
            'kurs_depo'                 => 'Kurs Depo',
            'kurs_depo_helper'          => '',
            'kurs_wd'                   => 'Kurs Wd',
            'kurs_wd_helper'            => '',
            'stok'                      => 'Stok',
            'stok_helper'               => '',
            'no_broker'                 => 'No Account Broker',
            'no_broker_helper'          => '',
            'nama_broker'               => 'Nama Account Broker',
            'nama_broker_helper'        => '',
            'status_transaksi'          => 'Status Transaksi',
            'status_transaksi_helper'   => '',
            'min_transaksi'             => 'Min Transaksi',
            'min_transaksi_helper'      => '',
            'max_transaksi'             => 'Max Transaksi',
            'max_transaksi_helper'      => '',
            'img_broker'                => 'Img Broker',
            'img_broker_helper'         => '',
            'komisi_ib'                 => 'Komisi Ib',
            'komisi_ib_helper'          => '',
            'komisi_pemilik'            => 'Komisi Pemilik',
            'komisi_pemilik_helper'     => '',
            'created_at'                => 'Created at',
            'created_at_helper'         => '',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => '',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => '',
            'team'                      => 'Team',
            'team_helper'               => '',
        ],
    ],
    'transaction'       => [
        'title'          => 'Transaction',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'no_order'               => 'No Order',
            'no_order_helper'        => '',
            'id_partner'             => 'Id Partner',
            'id_partner_helper'      => '',
            'jenis_currency'         => 'Jenis Currency',
            'jenis_currency_helper'  => '',
            'bank'                   => 'Bank',
            'bank_helper'            => 'Bank Users Relationship belum di setting',
            'currency_member'        => 'Currency Member',
            'currency_member_helper' => 'Currency member - Relationship belum di setting ke currency member',
            'nilai_depo'             => 'Kurs Depo',
            'nilai_depo_helper'      => '',
            'kurs_wd'                => 'Kurs Wd',
            'kurs_wd_helper'         => '',
            'diskon'                 => 'Diskon',
            'diskon_helper'          => '',
            'jumlahusd'              => 'Jumlah usd',
            'jumlahusd_helper'       => '',
            'total'                  => 'Total',
            'total_helper'           => '',
            'ket'                    => 'Keterangan',
            'ket_helper'             => '',
            'status'                 => 'Status',
            'status_helper'          => '',
            'diproses'               => 'Diproses',
            'diproses_helper'        => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => '',
            'team'                   => 'Team',
            'team_helper'            => '',
        ],
    ],
    'auditLog'          => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => '',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => '',
            'user_id'             => 'User ID',
            'user_id_helper'      => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory'   => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'slug'              => 'Slug',
            'slug_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'contentTag'        => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'slug'              => 'Slug',
            'slug_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'contentPage'       => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'title'                 => 'Title',
            'title_helper'          => '',
            'category'              => 'Categories',
            'category_helper'       => '',
            'tag'                   => 'Tags',
            'tag_helper'            => '',
            'page_text'             => 'Full Text',
            'page_text_helper'      => '',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => '',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => '',
        ],
    ],
    'bank'              => [
        'title'          => 'Bank',
        'title_singular' => 'Bank',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'nama'                  => 'Nama',
            'nama_helper'           => '',
            'nomor_rekening'        => 'Nomor Rekening',
            'nomor_rekening_helper' => '',
            'atasnama'              => 'Atasnama',
            'atasnama_helper'       => '',
            'status'                => 'Status',
            'status_helper'         => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
            'team'                  => 'Team',
            'team_helper'           => '',
        ],
    ],
    'userMenu'          => [
        'title'          => 'User Menu',
        'title_singular' => 'User Menu',
    ],
    'bankuser'          => [
        'title'          => 'Bankuser',
        'title_singular' => 'Bankuser',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'nama'                  => 'Nama',
            'nama_helper'           => '',
            'nomor_rekening'        => 'Nomor Rekening',
            'nomor_rekening_helper' => '',
            'atas_nama'             => 'Atas Nama',
            'atas_nama_helper'      => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
            'id_partner'            => 'Id Partner',
            'id_partner_helper'     => 'relationship ke id_partner table user',
        ],
    ],
    'currencyUser'      => [
        'title'          => 'Currency User',
        'title_singular' => 'Currency User',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'id_partner'          => 'Id Partner',
            'id_partner_helper'   => 'relationship ke id_partner user',
            'nama'                => 'Nama',
            'nama_helper'         => '',
            'no_account'          => 'No Account',
            'no_account_helper'   => '',
            'nama_account'        => 'Nama Account',
            'nama_account_helper' => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
        ],
    ],
];
