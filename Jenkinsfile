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
                git 'https://github.com/harisacademy/wordpress-site.git'
                
                // Build Docker image
                script {
                    docker.build(DOCKER_IMAGE)
                }
            }
        }
        
        stage('Test') {
            steps {
                // Run tests (if any)
                script {
                    // Insert your test commands here
                    // For example: sh 'npm test'
                }
            }
        }
        
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
