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
        // End Login

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
            // Cek apakah user dengan ID tertentu terkait dengan data absensi
            $this->db->query("SELECT * FROM absensi WHERE is_user = :user_id");
            $this->db->bind('user_id', $id);
            $result = $this->db->rowCount();

            if ($result > 0) {
                // Jika terkait dengan data absensi, hapus data absensi terlebih dahulu
                $query_absensi = "DELETE FROM absensi WHERE is_user = :user_id";
                $this->db->query($query_absensi);
                $this->db->bind('user_id', $id);
                $this->db->execute();
            }

            // Setelah itu, hapus user dari tabel user
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
            $this->db->bind('is_role', 2); // Set is_role to 2
            $this->db->bind('is_active', 0); // Set is_active to 0

            return $this->db->rowCount();
        }
    }
