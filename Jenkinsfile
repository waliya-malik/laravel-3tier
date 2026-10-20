pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker rm -f laravel-app || true'
                sh 'docker rmi laravel-3tier || true'
                sh 'docker build --no-cache -t laravel-3tier .'
            }
        }

        stage('Deploy') {
            steps {
                sh 'docker run -d -p 8000:80 --name laravel-app laravel-3tier'
                sh 'docker ps'
                sh 'sleep 5 && curl -I http://localhost:8000 || true'
            }
        }
    }
}
