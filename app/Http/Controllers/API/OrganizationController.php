<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Organization;

/**
 * @group Organization API
 * Class OrganizationController
 * @package App\Http\Controllers\API
 */
class OrganizationController extends Controller
{
    /**
     * Get Organization information
     * @transformer \App\Transformers\OrganizationTransformer
     * @transformerModel \App\Organization
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrganization($id)
    {
        return responder()->success(Organization::find($id))->respond();
    }
}
