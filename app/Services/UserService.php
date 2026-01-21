<?php

namespace App\Services;

use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function paginate($request)
    {
        $filters = $request->all();
        return $this->userRepository->getUsers($filters);
    }
    public function show($column, $value)
    {
        // SỬA: Gọi 'findByField' thay vì 'findBy'
        return $this->userRepository->findByField($column, $value);
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 're_password', 'send']);
            $payload['password'] = Hash::make($payload['password']); // Mã hóa pass
            
            $user = $this->userRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 're_password', 'send']);
            
            // Nếu không nhập pass mới thì bỏ qua, giữ pass cũ
            if (empty($payload['password'])) {
                unset($payload['password']);
            } else {
                $payload['password'] = Hash::make($payload['password']);
            }

            $this->userRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            // THAY ĐỔI Ở ĐÂY:
            // Thay vì xóa cứng: $this->userRepository->delete($id);
            // Chúng ta cập nhật trạng thái publish về 0 (0 nghĩa là đã xóa/khóa)
            
            $payload = [
                'publish' => 0, 
            ];
            
            $this->userRepository->update($id, $payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log lỗi nếu cần: Log::error($e->getMessage());
            return false;
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            // Cập nhật publish = 1 (Hoạt động lại)
            $this->userRepository->update($id, ['publish' => 1]);
            
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}