<?php declare(strict_types=1);

namespace Tests\Editora\Controllers\Database;

use Illuminate\Foundation\Testing\WithFaker;
use Omatech\Mapi\Editora\Infrastructure\Persistence\Eloquent\Models\AttributeDAO;
use Omatech\Mapi\Editora\Infrastructure\Persistence\Eloquent\Models\InstanceDAO;
use Omatech\Mapi\Editora\Infrastructure\Persistence\Eloquent\Models\RelationDAO;
use Omatech\Mapi\Editora\Infrastructure\Persistence\Eloquent\Models\ValueDAO;
use Tests\DatabaseTestCase;

final class ExtractInstanceTest extends DatabaseTestCase
{
    use WithFaker;

    /** @test */
    public function extractInstanceSuccessfullyFromMysql(): void
    {
        $instance1 = InstanceDAO::create([
            'uuid' => $this->faker->uuid(),
            'class_key' => 'class-three',
            'key' => 'instance-one',
            'status' => 'in-revision',
            'start_publishing_date' => '1989-03-08 09:00:00',
            'end_publishing_date' => '2100-03-08 09:00:00',
        ]);

        $attribute1 = AttributeDAO::create([
            'instance_id' => $instance1->id,
            'parent_id' => null,
            'key' => 'default-attribute',
        ]);

        $valueES1 = ValueDAO::create([
            'attribute_id' => $attribute1->id,
            'language' => 'es',
            'value' => 'valor1',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        ValueDAO::create([
            'attribute_id' => $attribute1->id,
            'language' => 'en',
            'value' => 'value1',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        $instance2 = InstanceDAO::create([
            'uuid' => $this->faker->uuid(),
            'class_key' => 'class-four',
            'key' => 'instance-two',
            'status' => 'in-revision',
            'start_publishing_date' => '1989-03-08 09:00:00',
            'end_publishing_date' => '2100-03-08 09:00:00',
        ]);

        $attribute2 = AttributeDAO::create([
            'instance_id' => $instance2->id,
            'parent_id' => null,
            'key' => 'default-attribute',
        ]);

        $valueES2 = ValueDAO::create([
            'attribute_id' => $attribute2->id,
            'language' => 'es',
            'value' => 'valor2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        ValueDAO::create([
            'attribute_id' => $attribute2->id,
            'language' => 'en',
            'value' => 'value2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        $instance3 = InstanceDAO::create([
            'uuid' => $this->faker->uuid(),
            'class_key' => 'class-five',
            'key' => 'instance-three',
            'status' => 'in-revision',
            'start_publishing_date' => '1989-03-08 09:00:00',
            'end_publishing_date' => '2100-03-08 09:00:00',
        ]);

        $attribute3 = AttributeDAO::create([
            'instance_id' => $instance3->id,
            'parent_id' => null,
            'key' => 'default-attribute',
        ]);

        $valueES3 = ValueDAO::create([
            'attribute_id' => $attribute3->id,
            'language' => 'es',
            'value' => 'valor2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        ValueDAO::create([
            'attribute_id' => $attribute3->id,
            'language' => 'en',
            'value' => 'value2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        $instance4 = InstanceDAO::create([
            'uuid' => $this->faker->uuid(),
            'class_key' => 'class-five',
            'key' => 'instance-four',
            'status' => 'in-revision',
            'start_publishing_date' => '1989-03-08 09:00:00',
            'end_publishing_date' => '2100-03-08 09:00:00',
        ]);

        $attribute4 = AttributeDAO::create([
            'instance_id' => $instance4->id,
            'parent_id' => null,
            'key' => 'default-attribute',
        ]);

        $valueES4 = ValueDAO::create([
            'attribute_id' => $attribute4->id,
            'language' => 'es',
            'value' => 'valor2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        ValueDAO::create([
            'attribute_id' => $attribute4->id,
            'language' => 'en',
            'value' => 'value2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        $instance5 = InstanceDAO::create([
            'uuid' => $this->faker->uuid(),
            'class_key' => 'class-five',
            'key' => 'instance-five',
            'status' => 'in-revision',
            'start_publishing_date' => '1989-03-08 09:00:00',
            'end_publishing_date' => '2100-03-08 09:00:00',
        ]);

        $attribute5 = AttributeDAO::create([
            'instance_id' => $instance5->id,
            'parent_id' => null,
            'key' => 'default-attribute',
        ]);

        $valueES5 = ValueDAO::create([
            'attribute_id' => $attribute5->id,
            'language' => 'es',
            'value' => 'valor2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        ValueDAO::create([
            'attribute_id' => $attribute5->id,
            'language' => 'en',
            'value' => 'value2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        $instance6 = InstanceDAO::create([
            'uuid' => $this->faker->uuid(),
            'class_key' => 'class-six',
            'key' => 'instance-six',
            'status' => 'in-revision',
            'start_publishing_date' => '1989-03-08 09:00:00',
            'end_publishing_date' => '2100-03-08 09:00:00',
        ]);

        $attribute6 = AttributeDAO::create([
            'instance_id' => $instance6->id,
            'parent_id' => null,
            'key' => 'default-attribute',
        ]);

        $valueES6 = ValueDAO::create([
            'attribute_id' => $attribute6->id,
            'language' => 'es',
            'value' => 'valor2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        ValueDAO::create([
            'attribute_id' => $attribute6->id,
            'language' => 'en',
            'value' => 'value2',
            'extra_data' => json_encode([], JSON_THROW_ON_ERROR),
        ]);

        RelationDAO::create([
            'key' => 'relation-key1',
            'parent_instance_id' => $instance1->id,
            'child_instance_id' => $instance2->id,
            'order' => 0,
        ]);

        RelationDAO::create([
            'key' => 'relation-key2',
            'parent_instance_id' => $instance1->id,
            'child_instance_id' => $instance3->id,
            'order' => 0,
        ]);

        RelationDAO::create([
            'key' => 'relation-key2',
            'parent_instance_id' => $instance1->id,
            'child_instance_id' => $instance4->id,
            'order' => 1,
        ]);

        RelationDAO::create([
            'key' => 'relation-key2',
            'parent_instance_id' => $instance1->id,
            'child_instance_id' => $instance5->id,
            'order' => 2,
        ]);

        RelationDAO::create([
            'key' => 'relation-key3',
            'parent_instance_id' => $instance4->id,
            'child_instance_id' => $instance6->id,
            'order' => 0,
        ]);

        $response = $this->postJson('extract', [
            'query' => '{
                InstanceOne(preview: false, language: es) {
                    RelationKey1(limit: 1)
                    RelationKey2(limit: 2) {
                        RelationKey3(limit: 1)
                    }
                }
            }'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'key' => 'instance-one',
            'attributes' => [
                [
                    'id' => $valueES1->id,
                    'key' => 'default-attribute',
                    'value' => $valueES1->value,
                    'attributes' => []
                ]
            ],
            'relations' => [
                'relation-key1' => [
                    [
                        'key' => 'instance-two',
                        'attributes' => [
                            [
                                'id' => $valueES2->id,
                                'key' => 'default-attribute',
                                'value' => $valueES2->value,
                                'attributes' => []
                            ]
                        ],
                        'relations' => []
                    ]
                ],
                'relation-key2' => [
                    [
                        'key' => 'instance-three',
                        'attributes' => [
                            [
                                'id' => $valueES3->id,
                                'key' => 'default-attribute',
                                'value' => $valueES3->value,
                                'attributes' => []
                            ]
                        ],
                        'relations' => [
                            'relation-key3' => []
                        ]
                    ], [
                        'key' => 'instance-four',
                        'attributes' => [
                            [
                                'id' => $valueES4->id,
                                'key' => 'default-attribute',
                                'value' => $valueES4->value,
                                'attributes' => []
                            ]
                        ],
                        'relations' => [
                            'relation-key3' => [
                                [
                                    'key' => 'instance-six',
                                    'attributes' => [
                                        [
                                            'id' => $valueES6->id,
                                            'key' => 'default-attribute',
                                            'value' => $valueES6->value,
                                            'attributes' => []
                                        ]
                                    ],
                                    'relations' => []
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
}
