    <?php

    class User_model
    {
        private $role = 'role';
        private $absensi = 'absensi';
        private $user = 'user';
        private $kelas = 'kelas';


        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getLastInsertedId()
        {
            return $this->db->getLastInsertedId();
        }
        // Login
        public function authByUsername($data)
        {
            $this->db->query("SELECT * FROM $this->user WHERE username = :username AND password = :password");
            $this->db->bind("username", $data['username']); // $data['username'] = ['username'] ambil dari nama input yg ada di file
            $this->db->bind("password", $data['password']);

            return $this->db->rowCount();
        }

        public function getUserByUsername($data)
        {
            $this->db->query("SELECT * FROM $this->user WHERE username = :username");
            $this->db->bind("username", $data['username']);

            return $this->db->result();
        }

        public function getKelasByUserId($userId)
        {
            $this->db->query("SELECT nama_kelas FROM kelas WHERE is_user = :user_id");
            $this->db->bind('user_id', $userId);
            return $this->db->single();
        }

        public function countAbsensiByUserId($userId)
        {
            $this->db->query("
        SELECT COUNT(absensi.id) AS total_absensi 
        FROM absensi 
        JOIN kelas ON absensi.is_kelas = kelas.id 
        WHERE kelas.is_user = :user_id
    ");
            $this->db->bind('user_id', $userId);
            return $this->db->single();
        }

        public function getAbsensiDetailsByUserId($userId)
        {
            $this->db->query("
        SELECT absensi.id, user.username, kelas.nama_kelas, absensi.absensi 
        FROM absensi 
        JOIN kelas ON absensi.is_kelas = kelas.id 
        JOIN user ON absensi.is_user = user.id
        WHERE kelas.is_user = :user_id
    ");
            $this->db->bind('user_id', $userId);
            return $this->db->resultAll();
        }

        public function updateAbsensiStatus($id, $status)
        {
            $query = "UPDATE absensi SET absensi = :status WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('status', $status);
            $this->db->bind('id', $id);
            return $this->db->execute();
        }

        public function getAbsensiCreatedAt($id)
        {
            $query = "SELECT created_at FROM absensi WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->single()['created_at'];
        }



        // End LoginMember


        //student
        public function countAllStudent()
        {
            $this->db->query("SELECT * FROM $this->user where is_role = 1");
            return $this->db->rowCount();
        }

        public function getAllStudent()
        {
            $this->db->query("SELECT user.*, kelas.nama_kelas 
                        FROM $this->user 
                        LEFT JOIN absensi ON user.id = absensi.is_user 
                        LEFT JOIN kelas ON absensi.is_kelas = kelas.id 
                        WHERE user.is_role = 1");
            return $this->db->resultAll();
        }


        public function addMurid($data)
        {
            $query = "INSERT INTO $this->user (username, password, is_role, is_active) VALUES (:username, :password, :is_role, :is_active)";
            $this->db->query($query);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', $data['password']);
            $this->db->bind('is_role', 1);
            $this->db->bind('is_active', 0);

            return $this->db->rowCount();
        }

        public function editMurid($data)
        {
            $query = "UPDATE $this->user SET username = :username, password = :password, is_active = :is_active WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $data['id']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', $data['password']);
            $this->db->bind('is_active', $data['is_active']);

            return $this->db->rowCount();
        }

        public function deleteMurid($id)
        {
            $this->db->query("SELECT * FROM absensi WHERE is_user = :user_id");
            $this->db->bind('user_id', $id);
            $result = $this->db->rowCount();

            if ($result > 0) {
                $query_absensi = "DELETE FROM absensi WHERE is_user = :user_id";
                $this->db->query($query_absensi);
                $this->db->bind('user_id', $id);
                $this->db->execute();
            }

            
            $query_user = "DELETE FROM user WHERE id = :user_id AND is_role = 1";
            $this->db->query($query_user);
            $this->db->bind('user_id', $id);

            return $this->db->rowCount();
        }

        // teacher
        public function countAllTeacher()
        {
            $this->db->query("SELECT * FROM $this->user where is_role = 1");
            return $this->db->rowCount();
        }

        public function getAllTeacher()
        {
            $this->db->query("SELECT user.*, kelas.nama_kelas 
                        FROM $this->user 
                        LEFT JOIN $this->kelas ON user.id = kelas.is_user
                        WHERE user.is_role = 2");
            return $this->db->resultAll();
        }

        public function editTeacher($data)
        {
            $query = "UPDATE $this->user SET username = :username, password = :password, is_active = :is_active WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $data['id']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', $data['password']);
            $this->db->bind('is_active', $data['is_active']);

            return $this->db->rowCount();
        }


        public function addTeacher($data)
        {
            $query = "INSERT INTO $this->user (username, password, is_role, is_active) VALUES (:username, :password, :is_role, :is_active)";
            $this->db->query($query);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', $data['password']);
            $this->db->bind('is_role', 2); 
            $this->db->bind('is_active', 0); 

            return $this->db->rowCount();
        }

        public function deleteGuru($id)
        {
            $this->db->bind('user_id', $id);
            $resultKelas = $this->db->single();

            if ($resultKelas) {
                $kelasId = $resultKelas['id'];
                $this->db->query("SELECT * FROM absensi WHERE is_kelas = :kelas_id");
                $this->db->bind('kelas_id', $kelasId);
                $resultAbsensi = $this->db->single();

                if ($resultAbsensi) {
                    $this->db->query("DELETE FROM absensi WHERE is_kelas = :kelas_id");
                    $this->db->bind('kelas_id', $kelasId);
                    $this->db->execute();
                }

                // Setelah itu, hapus data kelas
                $this->db->query("DELETE FROM kelas WHERE is_user = :user_id");
                $this->db->bind('user_id', $id);
                $this->db->execute();
            }

            $this->db->query("DELETE FROM user WHERE id = :user_id AND is_role = 2");
            $this->db->bind('user_id', $id);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }
