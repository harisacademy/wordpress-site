pipeline {
    agent any
    
    environment {
        DOCKER_IMAGE = "docker.io/harikishan468/wordpress-app"
        HELM_CHART = "wordpress-chart"
        KUBE_NAMESPACE = "wordpress"
    }
    
    stages {
        stage('Build') {
            steps {
                // Checkout source code from Git repository
                //git 'https://github.com/harisacademy/wordpress-site.git'
                checkout scm: [$class: 'GitSCM', branches: [[name: 'main']], userRemoteConfigs: [[url: 'https://github.com/harisacademy/wordpress-site.git']]]
                // Build Docker image
                script {
                    sh 'sudo apt update && sudo apt install docker.io'
                    sh 'sudo systemctl start docker && sudo systemctl enable docker'
                    sh 'docker build -t harikishan468/wordpress-app .'
                }
            }
        }

        stage('Tag Docker Image') {
            steps {
                script {
                    // Tag Docker image
                    sh 'docker tag harikishan468/wordpress-app:latest docker.io/harikishan468/wordpress-app:latest'
                }
            }
        }

        stage('Push Docker Image to Docker Hub') {
            steps {
                script {
                    // Login to Docker Hub
                    withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials', usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                        sh "docker login -u ${DOCKER_USERNAME} -p ${DOCKER_PASSWORD}"
                    }
                    // Push Docker image
                    sh 'docker push docker.io/harikishan468/wordpress-app:latest'
                }
            }
        }
     /*   
        stage('Test') {
            steps {
                // Run tests (if any)
                script {
                    // Insert your test commands here
                    // For example: sh 'npm test'
                }
            }
        }
        */
        
        stage('Deploy') {
            steps {
                // Install or upgrade Helm chart
                script {
                    sh "helm upgrade --install ${HELM_CHART} . --namespace=${KUBE_NAMESPACE} --set=image.repository=${DOCKER_IMAGE}"
                }
            }
        }
    }
    
    post {
        success {
            echo 'Deployment successful!'
            // Notify Slack or other messaging platform
        }
        failure {
            echo 'Deployment failed!'
            // Send notification for failure
        }
    }
}
