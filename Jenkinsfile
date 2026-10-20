pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                sh 'docker rm -f laravel-app || true'
                sh 'docker rmi laravel-3tier || true'
                sh 'docker build --no-cache -t laravel-3tier .'
            }
        }
        stage('Deploy') {
            steps {
                sh 'docker rm -f laravel-app || true'
                sh 'docker run -d -p 8000:80 --name laravel-app laravel-3tier'
                sh 'sleep 6'
                sh 'docker exec laravel-app bash -c "touch database/database.sqlite && chmod 777 database/database.sqlite && php artisan migrate --force || true"'
                sh 'docker ps'
                sh 'curl -I http://localhost:8000'
            }
        }
    }
}
