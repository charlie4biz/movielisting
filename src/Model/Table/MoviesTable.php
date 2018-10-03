<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movies Model
 *
 * @method \App\Model\Entity\Movie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Movie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movie findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MoviesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('movies');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Josegonzalez/Upload.Upload', [
          // You can configure as many upload fields as possible,
          // where the pattern is `field` => `config`
          //
          // Keep in mind that while this plugin does not have any limits in terms of
          // number of files uploaded per request, you should keep this down in order
          // to decrease the ability of your users to block other requests.
          'photo' => [
            'fields' => [
            // if these fields or their defaults exist
            // the values will be set.
            'dir' => 'photo_dir', // defaults to `dir`
            'size' => 'photo_size', // defaults to `size`
        ],
        'nameCallback' => function ($data, $settings) {
          $temp = explode(".", $data["name"]);
          $data['name'] = reset($temp) . '.' . round(microtime(true)) . '.' . end($temp);
                    return strtolower($data['name']);
                },
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);

                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(200, 270);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => $data['name'],
                        $tmp => 'movie-' . $data['name'],
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false
          ],
      ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator->provider('upload', \Josegonzalez\Upload\Validation\DefaultValidation::class);

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 50)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('synopsis')
            ->requirePresence('synopsis', 'create')
            ->notEmpty('synopsis');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status')
            ->add('status', 'inList', [
                'rule' => ['inList', ['Upcoming', 'Showing']],
                'message' => 'Select a valid status Upcoming or Showing'
            ]);

        $validator
            ->dateTime('start')
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->dateTime('end')
            ->requirePresence('end', 'create')
            ->notEmpty('end');

        /*$validator
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 50)
            ->requirePresence('photo_dir', 'create')
            ->notEmpty('photo_dir');

        $validator
            ->scalar('photo_size')
            ->maxLength('photo_size', 50)
            ->requirePresence('photo_size', 'create')
            ->notEmpty('photo_size');*/

        $validator
            ->scalar('time')
            ->maxLength('time', 50)
            ->requirePresence('time', 'create')
            ->notEmpty('time');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 50)
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        $validator
            ->scalar('cast')
            ->maxLength('cast', 50)
            ->requirePresence('cast', 'create')
            ->notEmpty('cast');

        $validator
            ->integer('ticket')
            ->requirePresence('ticket', 'create')
            ->notEmpty('ticket');

        $validator
            ->integer('kids')
            ->requirePresence('kids', 'create')
            ->notEmpty('kids');

        return $validator;
    }
}
