<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('movies')
            ->addColumn('title', 'string', [
                'default' => '0',
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('synopsis', 'string', [
                'default' => '0',
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('start', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('end', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('time', 'time', [
                'default' => '00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('users')
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->table('movies')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
