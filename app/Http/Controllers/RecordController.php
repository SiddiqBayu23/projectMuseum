<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class RecordController extends Controller
{
    /**
     * Display a listing of the records.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $records = Record::with('user')->latest()->paginate(10);
            
            return response()->json([
                'success' => true,
                'message' => 'Records retrieved successfully',
                'data' => $records
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve records',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'RecordCreate' => 'required|string|max:255',
                'RecordUserid' => 'required|integer|exists:users,id',
                'RecordStatus' => 'required|string|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation errors',
                    'errors' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $record = Record::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Record created successfully',
                'data' => $record
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create record',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $record = Record::with('user')->find($id);

            if (!$record) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found'
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'success' => true,
                'message' => 'Record retrieved successfully',
                'data' => $record
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve record',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $record = Record::find($id);

            if (!$record) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found'
                ], Response::HTTP_NOT_FOUND);
            }

            $validator = Validator::make($request->all(), [
                'RecordCreate' => 'sometimes|string|max:255',
                'RecordUserid' => 'sometimes|integer|exists:users,id',
                'RecordStatus' => 'sometimes|string|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation errors',
                    'errors' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $record->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Record updated successfully',
                'data' => $record
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update record',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified record from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $record = Record::find($id);

            if (!$record) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found'
                ], Response::HTTP_NOT_FOUND);
            }

            $record->delete();

            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete record',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Search records based on criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        try {
            $query = Record::with('user');

            if ($request->has('RecordStatus')) {
                $query->where('RecordStatus', $request->RecordStatus);
            }

            if ($request->has('RecordUserid')) {
                $query->where('RecordUserid', $request->RecordUserid);
            }

            if ($request->has('RecordCreate')) {
                $query->where('RecordCreate', 'like', '%' . $request->RecordCreate . '%');
            }

            $records = $query->latest()->paginate(10);

            return response()->json([
                'success' => true,
                'message' => 'Records retrieved successfully',
                'data' => $records
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to search records',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
