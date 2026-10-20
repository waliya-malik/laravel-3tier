pipeline {
    agent any
    stages {
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t laravel-3tier .'
            }
        }
        stage('Deploy Container') {
            steps {
                sh '''
                docker rm -f laravel-app || true
                docker run -d -p 8000:80 --name laravel-app laravel-3tier
                '''
            }
        }
    }
}
